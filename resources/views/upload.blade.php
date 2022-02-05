
  <form method="POST" enctype="multipart/form-data" action="{{ route('upload-test') }}" >
    {{ csrf_field() }}
      <div class="form-group">
          <input type="file" name="image" placeholder="Choose Image" accept="image/*" id="file">
            @error('file')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
      </div>
          
      <div class="col-md-12">
          <button type="submit" class="btn btn-primary" id="submit">Submit</button>
      </div>
  </form>