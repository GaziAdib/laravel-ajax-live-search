@extends('layouts.app')

@section('content')

   <div class="container mt-3 mb-3 pd-4">
    <h2>Product Search Page With Ajax</h2>
    <hr>
        <div class="row justify-content-center mt-4 mb-4 pd-3">
            <div class="col-md-4">
                <div class="input-group">
                    <input type="search" id="search" name="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    <button type="button" class="btn btn-outline-primary">search</button>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card mycard m-3 p-3" style="width: 18rem;">

                </div>
            </div>
        </div>
   </div>


   <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
   </script>

<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>


<script type="text/javascript">

    $(document).ready(function () {
        $('.mycard').hide();
        $('#search').on('keyup', function(){
            var value = $(this).val();
            $.ajax({
                type: "get",
                url: "{{URL::to('search')}}",
                data: {'search': value},
                success: function (data) {
                    console.log(data);
                    $('.mycard').show();
                    $('.mycard').html(data);
                }
            });
        });
    });


</script>



@endsection
