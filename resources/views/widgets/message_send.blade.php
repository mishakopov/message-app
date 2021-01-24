{{--Message Send --}}
@if(Session::has('success'))
    <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
@endif

@if(Session::has('error'))
    <div class="alert alert-success" role="alert">{{ Session::get('error') }}</div>
@endif
<div class="col-6 mx-auto mt-5">
    <form action="{{url('send-message')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            @if($errors->has('name'))
                <small class="form-text text-danger">{{ $errors->first('name') }}</small>
            @endif
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
            @if($errors->has('email'))
                <small class="form-text text-danger">{{ $errors->first('email') }}</small>
            @endif
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" rows="5" class="form-control"> {{ old('message') }}</textarea>
            @if($errors->has('message'))
                <small class="form-text text-danger">{{ $errors->first('message') }}</small>
            @endif
        </div>
        <input name="widget_id" type="hidden" value="{{ $config['widget_id'] }}">

        <div class="text-center">
            <input type="submit" value="Submit" class="btn mt-1  btn-lg btn-primary">
        </div>
    </form>
</div>


{{--Table of Messages--}}
<div class="mt-5">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Message</th>
        </tr>
        </thead>
        <tbody>
        @foreach($messages as $message)
            <tr>
                <td>{{ $message->name }}</td>
                <td>{{ $message->email }}</td>
                <td>{{ $message->message }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $messages->links('pagination::bootstrap-4') }}
</div>
