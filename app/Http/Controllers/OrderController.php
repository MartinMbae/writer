<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Source;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        foreach ($orders as $order) {
            $name = Source::where('id', $order->source_id)->first()->name;
            $order->source_name = $name;
        }

        return view('admin.orders', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
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

        return view('admin.new_order', compact('sources', 'paper_types', 'subjects',
            'paper_levels', 'writing_formats', 'languages', 'spacings', 'random'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
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
        return redirect('orders');


    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $name = Source::where('id', $order->source_id)->first()->name;
        $order->source_name = $name;
        $attachments= array_filter(Storage::disk('public')->files(),
            function ($item)use ($order) {return Str::startsWith($item, $order->random_id);}
        );
        $users = User::all();
        return view('admin.view_order', compact('order','users', 'attachments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function add_files(Request $request, $random)
    {
        if ($request->hasFile('file')) {
            if ($request->file('file')->isValid()) {
                $request->validate([
                    'file' => 'mimes:jpeg,png,css,|max:1014',
                ]);
                $extension = $request->file->extension();
                $filename = $random.'_'.Str::random(5);
                $request->file->storeAs('/public', $filename.".".$extension);
                $url = Storage::url($filename.".".$extension);
                echo $url;
            }
        }
    }
}
