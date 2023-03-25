@extends('layouts.default')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<div class="container1">
    <div class="row align-items-center mb-4">
        <div class="col-md-6">
            <h1>Profile</h1>
        </div>
    </div>

    <div style="letter-spacing:2px;">
            <div class="card mb-4 box-shadow">
                <div class="card-body" style="display:flex;">
                    <div class="col-sm-2 p-3">
                        <p class="h3 text-capitalize mb-4 pb-3" > Name: </p>
                        <p class=" h3 mb-4 pb-2"> Email: </p>
                        <p class="h3"> Telephone Number: </p>
                    </div>

                    <form class="col-sm-8" id="editProfile" action="editProfile" method="POST">
                    @csrf
                        <div class="p-3 inline-block">
                            <input class="text-capitalize border-0 h3" type="text" name="name" id="editField" value="{{$user['name']}}" 
                                 readonly> </input><br>
                            <span style="color:red;" >@error('name'){{$message}}@enderror</span><br>

                            <input class=" border-0 h3" type="text" name="email" id="editField" value="{{$user['email']}}" 
                                readonly> </input><br>
                            <span style="color:red; white-space:nowrap;">@error('email'){{$message}}@enderror</span><br>

                            <input class=" h3 border-0" type="text" name="tel_no" id="editField" value="{{$user['tel_no']}}" 
                                 readonly> </input><br>
                            <span style="color:red; ">@error('tel_no'){{$message}}@enderror</span>
                        </div>
                    </form>

                    
                    <div class="col-sm-2 p-3 ">     
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
        // $("input[id^='editField']").attr('readOnly','readOnly');
        // $("#cancelButt").hide();
        // $("#saveButt").hide();
        // $("#editButt").toggle();
        // $("input[id^='editField']")['0'].reset()
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
