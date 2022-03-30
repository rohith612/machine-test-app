@extends('layout.base')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12">
            
            <form method="post" action="{{ route('merchant.store') }}">
                @csrf
                <div class="form-group">
                <label for="shopname">Name</label>
                    <input type="text" name="shopname" id="shopname" type="text" class="form-control"  value="{{ old('shopname', '') }}"  required />
                    @error('shopname')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" type="text" class="form-control"  value="{{ old('email', '') }}" required />
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="mobile">Mobile</label>
                    <input type="text" name="mobile" id="mobile" type="text" class="form-control"  value="{{ old('mobile', '') }}" required />
                    @error('mobile')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <div>
                        <input type="button" class="add-row btn btn-default" value="Add Branch">
                    </div>
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Branch</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    <button type="button" class="delete-row btn btn-danger pull-right">Delete Row</button>
                </div>

                </div> 

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('merchant.index') }}" class="btn btn-link">Back</a>

            </form>
        </div>

    </div>


</div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function() {
          addRows();

          $(".add-row").click(function() {
            let checkEmpty = true; 
            $('input[name="branches[]"]').each(function() {
                if ($(this).val() == "") {
                    checkEmpty = false;
                    return checkEmpty;
                }
            });
            if(checkEmpty){
                addRows();
            }else{
                alert('Please fill the branch location')
            }
          });

          $(".delete-row").click(function() {
              $("table tbody").find('input[name="record"]').each(function() {
                  if ($(this).is(":checked")) {
                      $(this).parents("tr").remove();
                  }
              });
          });

          function addRows(){
            var markup = "<tr><td><input type='checkbox' name='record'></td><td><input type='text' name='branches[]' class='form-control branch-name' required /></td></tr>";
              $("table tbody").append(markup);
          }
      });
  </script>
@endsection