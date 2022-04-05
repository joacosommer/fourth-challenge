<button type="button" id="addCityButton"
        class="mt-3 w-full inline-flex items-center justify-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
    Add city
</button>

<div class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true"
     id="createCityModal">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div
            class="relative inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
            <form class="mt-5 sm:flex sm:items-center" name="addCity" action="{{url('cities')}}" method="post"
                  onsubmit="return validateForm()">
                @csrf
                <div class="w-full sm:max-w-xs">
                    <div>
                        <label for="text" class="block text-sm font-medium text-gray-700">City</label>
                        <div class="mt-1">
                            <input type="text" name="name" id="name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <button type="button" id="cancelCityModel"
                        class="bg-gray-500 text-white p-2 rounded text-sm w-auto">
                    Cancel
                </button>
                <button type="submit" class="bg-blue-500 text-white p-2 ml-6 rounded text-lg w-">
                    Save
                </button>
            </form>
        </div>
    </div>
</div>
@section('scripts')
<script>
    $(document).ready(function (){
        fetchcities();

        function fetchcities() {
            $.ajax({
                type: "GET",
                url: "/fetch-cities",
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    $('tbody').html("");
                    $.each(response.students, function (key, item) {
                        $('tbody').append('<tr>\
                            <td>' + item.id + '</td>\
                            <td>' + item.name + '</td>\
                            <td>' + item.course + '</td>\
                            <td>' + item.email + '</td>\
                            <td>' + item.phone + '</td>\
                            <td><button type="button" value="' + item.id + '" class="btn btn-primary editbtn btn-sm">Edit</button></td>\
                            <td><button type="button" value="' + item.id + '" class="btn btn-danger deletebtn btn-sm">Delete</button></td>\
                        \</tr>');
                    });
                }
            });
        }

        $(document).on('click', '.add_student', function (e) {
            e.preventDefault();

            $(this).text('Sending..');

            var data = {
                'name': $('.name').val(),
                'course': $('.course').val(),
                'email': $('.email').val(),
                'phone': $('.phone').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/students",
                data: data,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 400) {
                        $('#save_msgList').html("");
                        $('#save_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#save_msgList').append('<li>' + err_value + '</li>');
                        });
                        $('.add_student').text('Save');
                    } else {
                        $('#save_msgList').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#AddStudentModal').find('input').val('');
                        $('.add_student').text('Save');
                        $('#AddStudentModal').modal('hide');
                        fetchstudent();
                    }
                }
            });

        });





    let modal = document.getElementById('createCityModal');
    let btn = document.getElementById('addCityButton');
    let cancel_btn = document.getElementById('cancelCityModel');

    btn.onclick = function () {
        modal.classList.remove('hidden')
    }
    cancel_btn.onclick = function () {
        modal.classList.add('hidden')
    }

    function validateForm() {
        let x = document.forms["addCity"]["name"].value;
        if (x == "") {
            alert("Name must be filled out");
            return false;
        }
    }
</script>
@endsection
