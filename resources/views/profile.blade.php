@extends('layouts.default')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<div class="container1">
    <div class="row align-items-center mb-4">
        <div class="col-md-6">
            <h1>Profile</h1>
        </div>
    </div>

    <div style="letter-spacing:2px;" >
            <div class="card mb-4 box-shadow">
                <div class="card-body d-sm-flex">
                    <form class="col-sm-8" id="editProfile" action="editProfile" method="POST">
                    @csrf
                        <div class="mb-4">
                            <label class="form-label h4" for="name">Name</label>
                            <input type="text" id="editField" name="name" class="form-control input-lg" value="{{$user['name']}}" readOnly/>
                            
                            <span style="color:red">@error('name'){{$message}}@enderror</span>
                        </div>
                        <div class="mb-4">
                            <label class="form-label h4" for="email">Email</label>
                            <input type="email" id="editField" name="email" class="form-control input-lg" value="{{$user['email']}}" readOnly/>
                            <span style="color:red">@error('email'){{$message}}@enderror</span>
                        </div>
                        <div class="mb-4">
                            <label class="form-label h4" for="tel_no">Phone Number</label>
                            <input type="number" id="editField" name="tel_no" class="form-control input-lg" value="{{$user['tel_no']}}" readOnly/>
                            <span style="color:red">@error('tel_no'){{$message}}@enderror</span>
                        </div>
                    </form>

                    
                    <div class="col-sm-3 p-3 ">     
                        <div class="text-end">
                            <button id="editButt" type="submit" class="btn btn-outline-primary btn-lg" 
                                style="background-color: #fff; color: #007bff;">Edit</button>

                            <br>
                            <form>                    
                            <input id="saveButt" type="button" value="Save" class="btn btn-outline-primary btn-lg" 
                                style=" display: none; background-color: #fff; color: #007bff;" onclick="document.getElementById('editProfile').submit();"/>

                            <button id='cancelButt' type="reset" class="btn btn-outline-danger btn-lg" 
                                style="display: none; background-color: #fff; color: #FF0000;">Cancel</button>
                            </form>             
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
</div>

<script type="application/javascript">
$(document).ready (function(){
    $('#editButt').click(function(){
        $("input[id^='editField']").removeAttr('readOnly')
        $("#cancelButt").toggle();
        $("#saveButt").toggle();
        $("#editButt").hide();
    });
});
    
</script>

<script>
$(document).ready (function(){
    $('#cancelButt').click(function(){
        location.reload();
    });

    $('#saveButt').click(function(){
        $("input[id^='editField']").attr('readOnly','readOnly');
        $("#cancelButt").hide();
        $("#saveButt").hide();
        $("#editButt").toggle();
    });
});

</script>
@endsection
