@if ($errors->any())
        <div class="alert alert-danger">
           <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>

              @endforeach
           </ul>
        </div>
 @endif
  @if (Session::has('succesfull_message'))
        <div class="alert alert-success">
           <ul>
                  <li>{{Session::get('succesfull_message')}}</li>
           </ul>
        </div>
 @endif
  @if (Session::has('error_succesfull_message'))
        <div class="alert alert-danger">
           <ul>
                  <li>{{Session::get('error_succesfull_message')}}</li>
           </ul>
        </div>
 @endif

 
