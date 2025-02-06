@extends('layouts.app')

@section('title', 'View Event')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Event Details</h1>
    
    <div class="card shadow-lg">
        <div class="card-body">
            <h2 class="card-title text-primary">{{ $event->title }}</h2>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Vendor:</strong> {{ $event->vendor->company_name }}</p>
                    <p><strong>Category:</strong> {{ $event->category->name }}</p>
                    <p><strong>Venue:</strong> {{ $event->venue->name }}</p>
                    <p><strong>Artist:</strong> {{ $event->artist->name ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Start Date:</strong> {{ $event->start_date }}</p>
                    <p><strong>End Date:</strong> {{ $event->end_date }}</p>
                    <p><strong>Event Status:</strong> {{ ucfirst($event->event_status) }}</p>
                    <p><strong>Age Limit:</strong> {{ $event->age_limit }}</p>
                </div>
            </div>
            
            <div class="mb-3">
                <h4 class="text-secondary">Description</h4>
                <p>{{ $event->description }}</p>
                <p class="text-muted">{{ $event->short_description }}</p>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Ticket Price:</strong> ${{ number_format($event->ticket_price, 2) }}</p>
                    <p><strong>Total Tickets:</strong> {{ $event->total_tickets }}</p>
                    <p><strong>Min Tickets Per Order:</strong> {{ $event->min_tickets_per_order }}</p>
                    <p><strong>Max Tickets Per Order:</strong> {{ $event->max_tickets_per_order }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Contact Email:</strong> {{ $event->contact_email }}</p>
                    <p><strong>Contact Phone:</strong> {{ $event->contact_phone }}</p>
                </div>
            </div>
            
            <div class="mb-3">
                <h4 class="text-secondary">Meta Information</h4>
                <p><strong>Meta Title:</strong> {{ $event->meta_title }}</p>
                <p><strong>Meta Description:</strong> {{ $event->meta_description }}</p>
            </div>
            
            @if($event->banner)
                <div class="mb-3 text-center">
                    <h4 class="text-secondary">Event Banner</h4>
                    <img src="{{ asset('storage/' . $event->banner) }}" class="img-fluid rounded" alt="Event Banner">
                </div>
            @endif
            
            @if($event->event_images)
                <h4 class="text-secondary">Event Images</h4>
                <div class="row">
                    @foreach(json_decode($event->event_images, true) as $image)
                        <div class="col-md-3 mb-3">
                            <img src="{{ asset('storage/' . $image) }}" class="img-fluid rounded shadow-sm" alt="Event Image">
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="text-center mt-4">
                <a href="{{ route('events.index') }}" class="btn btn-secondary">Back</a>
                <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection
