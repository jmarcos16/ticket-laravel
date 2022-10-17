@csrf
<div class="my-1">
    <div class="form-floating mb-3">
        <input type="text" class="form-control shadow-none" id="title" name="title" placeholder="Title Ticket"
            value="{{ $ticket->title ?? '' }}">
        <label for="title">Title Ticket</label>
    </div>
    <div class="form-floating">
        <textarea class="form-control shadow-none" name="content" id="content" cols="20" rows="50"
            placeholder="Description Ticket" style="height: 150px">{{ $ticket->content ?? '' }}</textarea>
        <label for="content">Description Ticket</label>
    </div>

</div>
