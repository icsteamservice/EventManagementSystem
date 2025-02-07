<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Vendor;
use App\Models\Venue;
use App\Models\Category;
use App\Models\Artist;

class EventController extends Controller
{
    /**
     * Display a listing of events.
     */
    public function index()
    {
        $events = Event::all();
        return view('event.index', compact('events'));
    }

    /**
     * Show the form for creating a new event.
     */
    public function create()
    {
        $vendors = Vendor::all();
        $venues = Venue::all();
        $categories = Category::all();
        $artists = Artist::all();

        return view('event.create', compact('vendors', 'venues', 'categories', 'artists'));
    }

    /**
     * Store a newly created event.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'vendor_id' => 'required|integer|exists:vendors,id',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'venue_id' => 'required|integer|exists:venues,id',
            'category_id' => 'required|integer|exists:categories,id',
            'artist_id' => 'nullable|integer|exists:artists,id',
            'event_status' => 'required|in:Draft,Published',
            'featured' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'terms_conditions' => 'nullable|string',
            'refund_policy' => 'nullable|string',
            'total_tickets' => 'required|integer',
            'min_tickets_per_order' => 'required|integer',
            'max_tickets_per_order' => 'required|integer',
            'ticket_price' => 'required|numeric',
            'contact_email' => 'nullable|email|max:100',
            'contact_phone' => 'nullable|string|max:20',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'event_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle Banner Upload
        if ($request->hasFile('banner')) {
            $validated['banner'] = $request->file('banner')->store('event_banners', 'public');
        }

        // Handle Multiple Event Images Upload
        if ($request->hasFile('event_images')) {
            $images = [];
            foreach ($request->file('event_images') as $image) {
                $images[] = $image->store('event_images', 'public');
            }
            $validated['event_images'] = json_encode($images);
        }

        // Create Event
        Event::create($validated);

        return redirect()->route('events.index')->with('success', 'Event created successfully!');
    }

    /**
     * Show the details of a specific event.
     */
    public function show($id)
    {
        
        $event = Event::with(['vendor', 'venue', 'category', 'artist'])->findOrFail($id);
        return view('event.show', compact('event'));
    }
}
