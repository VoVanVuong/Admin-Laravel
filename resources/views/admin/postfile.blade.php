<form action="{{ url('postfile') }}" enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}
        <input type="file" name="filesTest" required="true">
        <br/>
        <input type="submit" value="upload">
    </form>