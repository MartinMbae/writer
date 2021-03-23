<?php

namespace App\Http\Controllers;

use App\Models\AssignedOrder;
use App\Models\Order;
use App\Models\Source;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class OrderController extends Controller
{

    public function index($category = null)
    {
        if ($category == null) {
            $classification = 0;
            $subtitle = "All Orders";
            $orders = Order::all();
        } else {
            $classification = 1;
            switch ($category) {
                case 'available':
                    $status = '0';
                    $subtitle = "Available Orders";
                    break;
                case 'awarded':
                    $status = '1';
                    $subtitle = "Awarded Orders";
                    break;
                case 'revision':
                    $status = '2';
                    $subtitle = "Orders Under Revision";
                    break;
                case 'completed':
                    $status = '3';
                    $subtitle = "Completed Orders";
                    break;
                case 'rejected':
                    $status = '4';
                    $subtitle = "Rejected Orders";
                    break;
                case 'cancelled':
                    $status = '5';
                    $subtitle = "Cancelled Orders";
                    break;
                case 'paid':
                    $status = '6';
                    $subtitle = "Paid Orders";
                    break;
                default:
                    $status = null;
                    break;
            }
            if ($status == null) {
                abort(404);
            }
            $orders = Order::where("status", $status)->get();
        }
        foreach ($orders as $order) {
            $name = Source::where('id', $order->source_id)->first()->name;
            $order->source_name = $name;
            $status = $order->status;
            $badge = "";
            switch ($status) {
                case 0:
                    $order_status = "New";
                    $badge = "badge-light";
                    break;
                case 1:
                    $order_status = "Awarded";
                    $badge = "badge-info";
                    break;
                case 2:
                    $order_status = "Under Revision";
                    $badge = "badge-dark";
                    break;
                case 3:
                    $order_status = "Completed";
                    $badge = "badge-success";
                    break;
                case 4:
                    $order_status = "Rejected";
                    $badge = "badge-danger";
                    break;
                case 5:
                    $order_status = "Cancelled";
                    break;
                case 6:
                    $order_status = "Paid";
                    $badge = "badge-success";
                    break;
                default:
                    $order_status = "Not Defined";
                    break;
            }
            $order->status_name = $order_status;
            $order->badge = $badge;
        }
        $title = "All Orders";
        $counts = $this->getCounts();
        return view('admin.orders', compact('orders', 'title', 'subtitle', 'classification', 'counts'));
    }


    public function create()
    {
        $sources = Source::all();
        $paper_types = array(
            "Essay",
            "Term Paper",
            "Research Paper",
            "Coursework",
            "Book Report",
            "Book Review",
            "Movie Review",
            "Dissertation",
            "Thesis",
            "Thesis Proposal",
            "Research Proposal",
            "Dissertation Chapter - Abstract",
            "Dissertation Chapter - Introduction Chapter",
            "Dissertation Chapter - Literature Review",
            "Dissertation Chapter - Methodology",
            "Dissertation Chapter - Results",
            "Dissertation Chapter - Discussion",
            "Dissertation Services - Editing",
            "Dissertation Services - Proofreading",
            "Formatting",
            "Admission Services - Admission Essay",
            "Admission Services - Scholarship Essay",
            "Admission Services - Personal Statement",
            "Admission Services - Editing",
            "Editing",
            "Proofreading",
            "Case Study",
            "Lab Report",
            "Speech Presentation",
            "Math Problem",
            "Article",
            "Article Critique",
            "Annotated Bibliography",
            "Reaction Paper",
            "PowerPoint Presentation",
            "Statistics Project",
            "Multiple Choice Questions (None-Time-Framed)",
            "Other (Not listed)",
        );
        $subjects = array(
            "Art",
            "Biology",
            "Business",
            "Chemistry",
            "Communications and Media",
            "Creative writing",
            "Economics",
            "Education",
            "Engineering",
            "English",
            "Ethics",
            "History",
            "Law",
            "Linguistics",
            "Literature",
            "Management",
            "Marketing",
            "Mathematics",
            "Medicine and Health",
            "Nature",
            "Nursing",
            "Philosophy",
            "Physics",
            "Political Science",
            "Psychology",
            "Religion and Theology",
            "Sociology",
            "Technology",
            "Tourism",
        );
        $paper_levels = array(
            "High School",
            "College",
            "Undergraduate",
            "Master",
            "Ph.D.",
        );
        $writing_formats = array(
            "APA",
            "MLA",
            "CHICAGO",
            "HAVARD",
            "TURABIAN",
        );
        $languages = array(
            "UK",
            "AU",
            "US",
        );
        $spacings = array(
            "Single Spaced",
            "Double Spaced",
        );

        $random = Str::random(6);

        $title = "Add a new Order";

        $counts = $this->getCounts();
        return view('admin.create_order', compact('sources', 'paper_types', 'subjects',
            'paper_levels', 'writing_formats', 'languages', 'spacings', 'random', 'title', 'counts'));
    }


    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'source_id' => ['required', 'string'],
            'paper_type' => ['required', 'string'],
            'subject' => ['required', 'string',],
            'paper_level' => ['required', 'string',],
            'writing_format' => ['required', 'string',],
            'page_count' => ['required', 'int'],
            'slide_count' => ['required', 'int'],
            'source_count' => ['required', 'int'],
            'days' => ['required', 'int'],
            'amount' => ['required'],
            'order_no' => ['required'],
            'topic' => ['required'],
            'hours' => ['required', 'int'],
            'language' => ['required'],
            'spacing' => ['required'],
            'instructions' => ['required', 'string', 'max:255',],
            'pending_notes' => ['required', 'string', 'max:255',],
            'notes' => ['required', 'string', 'max:255',],
        ])->validate();

        $order = new Order();
        $order->source_id = $request->source_id;
        $order->paper_type = $request->paper_type;
        $order->subject = $request->subject;
        $order->paper_level = $request->paper_level;
        $order->writing_format = $request->writing_format;
        $order->page_count = $request->page_count;
        $order->slide_count = $request->slide_count;
        $order->source_count = $request->source_count;
        $order->days = $request->days;
        $order->hours = $request->hours;
        $order->amount = $request->amount;
        $order->order_no = $request->order_no;
        $order->topic = $request->topic;
        $order->language = $request->language;
        $order->spacing = $request->spacing;
        $order->instructions = $request->instructions;
        $order->pending_notes = $request->pending_notes;
        $order->notes = $request->notes;
        $order->random_id = $request->random_id;
        $order->save();

        $order->refresh();

        return redirect("orders/$order->id")->with("success","Your order has been created successfully");


    }


    public function show(Order $order)
    {
        $name = Source::where('id', $order->source_id)->first()->name;
        $order->source_name = $name;
        $file_attachments = array_filter(Storage::disk('public')->files(),
            function ($item) use ($order) {
                return Str::startsWith($item, $order->random_id);
            }
        );
        $attachments = array();
        $image_extensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];
        foreach ($file_attachments as $file_attachment) {
            $ext = pathinfo($file_attachment, PATHINFO_EXTENSION);
            $isImage = in_array($ext, $image_extensions);
            $single_attachments = array(
                'is_image' => $isImage,
                'name' => $file_attachment,
                'trimmed_name' => str_replace("$order->random_id" . "_", "", $file_attachment),
            );
            $attachments[] = (object)($single_attachments);
        }

        $users = User::all();
        $title = "View Order";
        $counts = $this->getCounts();


        $assigned_user = null;
        $assignmentDetails = null;
        if ($order->status != 0){
            $assigned_order = AssignedOrder::where("order_id",$order->id)->first();

            if ($assigned_order !=  null) {
                $assigned_user = User::find($assigned_order->user_id);

                $assigned_status = null;
                switch ($assigned_order->status) {
                    case 0:
                        $assigned_status = "Not Submitted";
                        break;
                    case 1:
                        $assigned_status = "Under Revision";
                        break;
                    case 2:
                        $assigned_status = "Completed";
                        break;
                    case 3:
                        $assigned_status = "Rejected";
                        break;
                    case 4:
                        $assigned_status = "Paid";
                        break;
                }
                $assignmentDetails = (object)array(
                    'date_of_assignment' => $assigned_order->created_at->timezone("Africa/Nairobi")->format('dS F Y \\a\\t g:i a'),
                    'status' => $assigned_status,
                );
            }
        }
        return view('admin.single_order', compact('order', 'users', 'attachments', 'title', 'counts', 'assigned_user', 'assignmentDetails'));
    }


    public function edit(Order $order)
    {

        $sources = Source::all();
        $paper_types = array(
            "Essay",
            "Term Paper",
            "Research Paper",
            "Coursework",
            "Book Report",
            "Book Review",
            "Movie Review",
            "Dissertation",
            "Thesis",
            "Thesis Proposal",
            "Research Proposal",
            "Dissertation Chapter - Abstract",
            "Dissertation Chapter - Introduction Chapter",
            "Dissertation Chapter - Literature Review",
            "Dissertation Chapter - Methodology",
            "Dissertation Chapter - Results",
            "Dissertation Chapter - Discussion",
            "Dissertation Services - Editing",
            "Dissertation Services - Proofreading",
            "Formatting",
            "Admission Services - Admission Essay",
            "Admission Services - Scholarship Essay",
            "Admission Services - Personal Statement",
            "Admission Services - Editing",
            "Editing",
            "Proofreading",
            "Case Study",
            "Lab Report",
            "Speech Presentation",
            "Math Problem",
            "Article",
            "Article Critique",
            "Annotated Bibliography",
            "Reaction Paper",
            "PowerPoint Presentation",
            "Statistics Project",
            "Multiple Choice Questions (None-Time-Framed)",
            "Other (Not listed)",
        );
        $subjects = array(
            "Art",
            "Biology",
            "Business",
            "Chemistry",
            "Communications and Media",
            "Creative writing",
            "Economics",
            "Education",
            "Engineering",
            "English",
            "Ethics",
            "History",
            "Law",
            "Linguistics",
            "Literature",
            "Management",
            "Marketing",
            "Mathematics",
            "Medicine and Health",
            "Nature",
            "Nursing",
            "Philosophy",
            "Physics",
            "Political Science",
            "Psychology",
            "Religion and Theology",
            "Sociology",
            "Technology",
            "Tourism",
        );
        $paper_levels = array(
            "High School",
            "College",
            "Undergraduate",
            "Master",
            "Ph.D.",
        );
        $writing_formats = array(
            "APA",
            "MLA",
            "CHICAGO",
            "HAVARD",
            "TURABIAN",
        );
        $languages = array(
            "UK",
            "AU",
            "US",
        );
        $spacings = array(
            "Single Spaced",
            "Double Spaced",
        );


        $title = "Edit Order";

        $counts = $this->getCounts();
        return view('admin.edit_order', compact('sources', 'paper_types', 'subjects',
            'paper_levels', 'writing_formats', 'languages', 'spacings', 'title', 'counts', 'order'));

    }

    public function update(Request $request, Order $order)
    {
        Validator::make($request->all(), [
            'source_id' => ['required', 'string'],
            'paper_type' => ['required', 'string'],
            'subject' => ['required', 'string',],
            'paper_level' => ['required', 'string',],
            'writing_format' => ['required', 'string',],
            'page_count' => ['required', 'int'],
            'slide_count' => ['required', 'int'],
            'source_count' => ['required', 'int'],
            'days' => ['required', 'int'],
            'amount' => ['required'],
            'order_no' => ['required'],
            'topic' => ['required'],
            'hours' => ['required', 'int'],
            'language' => ['required'],
            'spacing' => ['required'],
            'instructions' => ['required', 'string', 'max:255',],
            'pending_notes' => ['required', 'string', 'max:255',],
            'notes' => ['required', 'string', 'max:255',],
        ])->validate();

        $order->source_id = $request->source_id;
        $order->paper_type = $request->paper_type;
        $order->subject = $request->subject;
        $order->paper_level = $request->paper_level;
        $order->writing_format = $request->writing_format;
        $order->page_count = $request->page_count;
        $order->slide_count = $request->slide_count;
        $order->source_count = $request->source_count;
        $order->days = $request->days;
        $order->hours = $request->hours;
        $order->amount = $request->amount;
        $order->order_no = $request->order_no;
        $order->topic = $request->topic;
        $order->language = $request->language;
        $order->spacing = $request->spacing;
        $order->instructions = $request->instructions;
        $order->pending_notes = $request->pending_notes;
        $order->notes = $request->notes;
        $order->save();

        return redirect("orders/$order->id")->with("success","Order has been updated successfully");

    }


    public function destroy(Order $order)
    {
        Order::destroy($order->id);
        return Redirect::to('/orders')->with('success', 'Order has been deleted');
    }


    public function add_files(Request $request, $random)
    {
        if ($request->hasFile('file')) {
            if ($request->file('file')->isValid()) {
                $request->validate([
                    'file' => 'max:2048',
                ]);
                $extension = $request->file->getClientOriginalExtension();
                $filename = $random . '_' . pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_FILENAME);
                $request->file->storeAs('/public', $filename . "." . $extension);
                $url = Storage::url($filename . "." . $extension);
                echo $url;
            }
        }
    }


    public function getCounts(): object
    {
        $counts = array(
            'available' => Order::where('status', '0')->count(),
            'awarded' => Order::where('status', '1')->count(),
            'revision' => Order::where('status', '2')->count(),
            'completed' => Order::where('status', '3')->count(),
            'rejected' => Order::where('status', '4')->count(),
            'cancelled' => Order::where('status', '5')->count(),
            'paid' => Order::where('status', '6')->count(),
        );
        return (object)($counts);

    }

    public function assignToUser(Request  $request){

        $validator = Validator::make($request->all(), [
            'order_id' => ['required', 'numeric','unique:assigned_orders'],
            'user_id' => ['required', 'numeric'],
        ],[
            'order_id.unique' => "Oops!  Job has already been assigned to another user.",
        ]);
        if ($validator->fails()) {
            $errorString = implode(",",$validator->messages()->all());
            return  Redirect::back()->with('error', $errorString);
        }
        $assigned = new AssignedOrder();
        $assigned->order_id = $request->order_id;
        $assigned->user_id = $request->user_id;
        $assigned->save();

        $order = Order::find($request->order_id);
        $order->status = '1';
        $order->save();
        return Redirect::back()->with('success', 'Job has been assigned to the selected user');
    }

    public function cancel($order_id){
        $order = Order::find($order_id);
        $order->status = '5';
        $order->save();
        return Redirect::back()->with('success', 'Order has been cancelled successfully. Writers will not be able to access it.');
    }

    public function edit_attachment($order_id){
        $order = Order::find($order_id);
        $name = Source::where('id', $order->source_id)->first()->name;
        $order->source_name = $name;
        $file_attachments = array_filter(Storage::disk('public')->files(),
            function ($item) use ($order) {
                return Str::startsWith($item, $order->random_id);
            }
        );
        $attachments = array();
        $image_extensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];
        foreach ($file_attachments as $file_attachment) {
            $ext = pathinfo($file_attachment, PATHINFO_EXTENSION);
            $isImage = in_array($ext, $image_extensions);
            $single_attachments = array(
                'is_image' => $isImage,
                'name' => $file_attachment,
                'trimmed_name' => str_replace("$order->random_id" . "_", "", $file_attachment),
            );
            $attachments[] = (object)($single_attachments);
        }

        $users = User::all();
        $title = "View Order";
        $counts = $this->getCounts();


        $assigned_user = null;
        $assignmentDetails = null;
        if ($order->status != 0){
            $assigned_order = AssignedOrder::where("order_id",$order->id)->first();

            if ($assigned_order !=  null) {
                $assigned_user = User::find($assigned_order->user_id);

                $assigned_status = null;
                switch ($assigned_order->status) {
                    case 0:
                        $assigned_status = "Not Submitted";
                        break;
                    case 1:
                        $assigned_status = "Under Revision";
                        break;
                    case 2:
                        $assigned_status = "Completed";
                        break;
                    case 3:
                        $assigned_status = "Rejected";
                        break;
                    case 4:
                        $assigned_status = "Paid";
                        break;
                }
                $assignmentDetails = (object)array(
                    'date_of_assignment' => $assigned_order->created_at->timezone("Africa/Nairobi")->format('dS F Y \\a\\t g:i a'),
                    'status' => $assigned_status,
                );
            }
        }
        return view('admin.edit_attachments', compact('order', 'users', 'attachments', 'title', 'counts', 'assigned_user', 'assignmentDetails'));

    }
    public function test(){

//        return Redirect::to('/admin')->with('success', 'SOmething added successfuly');
        return Redirect::to('/admin')->with('error', 'SOmething bad happened');
    }

}
