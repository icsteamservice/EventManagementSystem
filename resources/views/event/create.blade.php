@extends('layouts.app')

@section('title', 'Create Event')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Create Event</h1>
    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <!-- Event Title -->
            <div class="col-md-6 mb-3">
                <label for="title">Event Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <!-- Vendor -->
            <div class="col-md-6 mb-3">
                <label for="vendor_id">Vendor</label>
                <select name="vendor_id" class="form-control" required>
                    <option value="">Select a vendor</option>
                    @foreach($vendors as $vendor)
                        <option value="{{ $vendor->id }}">{{ $vendor->company_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <!-- Description -->
            <div class="col-md-6 mb-3">
                <label for="description">Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <!-- Short Description -->
            <div class="col-md-6 mb-3">
                <label for="short_description">Short Description</label>
                <input type="text" name="short_description" class="form-control">
            </div>
        </div>

        <div class="row">
            <!-- Start Date -->
            <div class="col-md-6 mb-3">
                <label for="start_date">Start Date</label>
                <input type="datetime-local" name="start_date" class="form-control" required>
            </div>

            <!-- End Date -->
            <div class="col-md-6 mb-3">
                <label for="end_date">End Date</label>
                <input type="datetime-local" name="end_date" class="form-control" required>
            </div>
        </div>

        <div class="row">
            <!-- Venue -->
            <div class="col-md-6 mb-3">
                <label for="venue_id">Venue</label>
                <select name="venue_id" class="form-control" required>
                    <option value="">Select a venue</option>
                    @foreach($venues as $venue)
                        <option value="{{ $venue->id }}">{{ $venue->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Category -->
            <div class="col-md-6 mb-3">
                <label for="category_id">Category</label>
                <select name="category_id" class="form-control" required>
                    <option value="">Select a category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <!-- Artist -->
            <div class="col-md-6 mb-3">
                <label for="artist_id">Artist</label>
                <select name="artist_id" class="form-control">
                    <option value="">Select an artist</option>
                    @foreach($artists as $artist)
                        <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Event Status -->
            <div class="col-md-6 mb-3">
                <label for="event_status">Event Status</label>
                <select name="event_status" class="form-control">
                    <option value="Draft">Draft</option>
                    <option value="Published">Published</option>
                </select>
            </div>
        </div>

        <div class="row">
            <!-- Featured Event -->
            <div class="col-md-6 mb-3">
                <div class="form-check">
                    <input type="checkbox" name="featured" class="form-check-input">
                    <label class="form-check-label" for="featured">Featured Event</label>
                </div>
            </div>

            <!-- Publish Event -->
            <div class="col-md-6 mb-3">
                <div class="form-check">
                    <input type="checkbox" name="publish" class="form-check-input">
                    <label class="form-check-label" for="publish">Publish Event</label>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Meta Title -->
            <div class="col-md-6 mb-3">
                <label for="meta_title">Meta Title</label>
                <input type="text" name="meta_title" class="form-control">
            </div>

            <!-- Meta Description -->
            <div class="col-md-6 mb-3">
                <label for="meta_description">Meta Description</label>
                <textarea name="meta_description" class="form-control"></textarea>
            </div>
        </div>

        <div class="row">
            <!-- Age Limit -->
            <div class="col-md-6 mb-3">
                <label for="age_limit">Age Limit</label>
                <select name="age_limit" class="form-control">
                    <option value="All Ages">All Ages</option>
                    <option value="18+">18+</option>
                    <option value="21+">21+</option>
                </select>
            </div>

            <!-- Ticket Price -->
            <div class="col-md-6 mb-3">
                <label for="ticket_price">Ticket Price ($)</label>
                <input type="text" name="ticket_price" class="form-control" required>
            </div>
        </div>

        <div class="row">
            <!-- Total Tickets -->
            <div class="col-md-4 mb-3">
                <label for="total_tickets">Total Tickets</label>
                <input type="number" name="total_tickets" class="form-control" value="100" required>
            </div>

            <!-- Min Tickets Per Order -->
            <div class="col-md-4 mb-3">
                <label for="min_tickets_per_order">Min Tickets Per Order</label>
                <input type="number" name="min_tickets_per_order" class="form-control" value="1" required>
            </div>

            <!-- Max Tickets Per Order -->
            <div class="col-md-4 mb-3">
                <label for="max_tickets_per_order">Max Tickets Per Order</label>
                <input type="number" name="max_tickets_per_order" class="form-control" value="10" required>
            </div>
        </div>

        <div class="row">
            <!-- Contact Email -->
            <div class="col-md-6 mb-3">
                <label for="contact_email">Contact Email</label>
                <input type="email" name="contact_email" class="form-control">
            </div>

            <!-- Contact Phone -->
            <div class="col-md-6 mb-3">
                <label for="contact_phone">Contact Phone</label>
                <input type="text" name="contact_phone" class="form-control">
            </div>
        </div>

        <div class="row">
            <!-- Banner -->
            <div class="col-md-6 mb-3">
                <label for="banner">Event Banner</label>
                <input type="file" name="banner" class="form-control">
            </div>

            <!-- Additional Images -->
            <div class="col-md-6 mb-3">
                <label for="event_images">Event Images</label>
                <input type="file" name="event_images[]" class="form-control" multiple>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary">Create Event</button>
        </div>
    </form>
</div>
@endsection
