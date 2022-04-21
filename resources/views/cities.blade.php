<!doctype html>

<title>Fourth Challenge</title>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<meta name="csrf-token" content="{{csrf_token()}}">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>


<style>
    .clamp {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .clamp.one-line {
        -webkit-line-clamp: 1;
    }
</style>

<body style="font-family: Open Sans, sans-serif">
<div class="px-4 sm:px-6 lg:px-8">
    <div class="p-6 bg-gray-50 rounded-bl-2xl rounded-br-2xl md:px-8">
        <a href="/" class="text-base font-medium text-indigo-700 hover:text-indigo-600"><span
                aria-hidden="true"> &larr;</span>Go Back</a>
    </div>
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-xl font-semibold text-gray-900">Cities</h1>
            <p class="mt-2 text-sm text-gray-700">A list of all the cities including their id, name, number of
                departures and arrivals</p>
        </div>


        <button type="button" id="addCityButton"
                class="mt-3 w-full inline-flex items-center justify-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            Add city
        </button>
        {{--Create button--}}
        <div class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog"
             aria-modal="true"
             id="createCityModal">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div
                    class="relative inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
                    <div class="w-full sm:max-w-xs">
                        <div>
                            <label for="text" class="block text-2xl font-medium text-gray-700 text-center">Create City</label>
                            <label for="text" class="block text-sm font-medium text-gray-700 font-bold">City Name</label>
                            <div class="mt-1">
                                <input type="text" name="create_name" id="create_name"
                                       class="pb-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <ul class="text-red-500 pb-2" id="save_msgList"></ul>
                        </div>
                    </div>
                    <button type="submit"
                            class="add_city float-right bg-blue-500 text-white p-2 rounded text-sm w-auto rig">
                        Save
                    </button>
                    <button type="button" id="cancelCityModel"
                            class="float-right bg-gray-500 text-white p-2 rounded text-sm w-auto mx-4">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
        {{--Edit button--}}
        <div class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog"
             aria-modal="true"
             id="editCityModal">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div
                    class="relative inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
                    <div class="w-full sm:max-w-xs">
                        <div>
                            <div class="pb-2">
                                <label for="text" class="block text-2xl font-medium text-gray-700 text-center">Edit City</label>
                                <label for="text" class="block text-sm font-medium text-gray-700 font-bold">City Id</label>
                                <input type="text" name="city_id" id="city_id" disabled
                                       class="pb-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <label for="text" class="block text-sm font-medium text-gray-700 font-bold">City Name</label>
                            <div class="mt-1">
                                <input type="text" name="edit_name" id="edit_name"
                                       class="pb-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-md border-gray-300 rounded-md">
                            </div>
                            <ul class="text-red-500 pb-2" id="update_msgList"></ul>
                        </div>
                    </div>
                    <button type="submit"
                            class="update_city bg-blue-500 float-right text-white p-2 rounded text-sm w-auto">
                        Update
                    </button>
                    <button type="button" id="cancelCityEditBtn"
                            class="bg-gray-500 float-right text-white p-2 rounded text-sm w-auto mx-4">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
        {{--Delete Modal--}}
        <div class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog"
             aria-modal="true"
             id="deleteCityModal">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div
                    class="relative inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
                    <div class="w-full sm:max-w-xs pb-2">
                        <div>
                            <div class="pb-2">
                                <label for="text" class="block text-2xl font-medium text-gray-700 text-center">Confirm delete City?</label>
                            </div>
                            <label for="text" class="block text-sm font-medium text-gray-700 font-bold">City Id</label>
                            <input type="text" name="cityDelete_id" id="cityDelete_id" disabled
                                   class="pb-2 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">

                            <ul class="text-red-500" id="update_msgList"></ul>
                        </div>
                    </div>
                    <button type="submit"
                            class="delete_city bg-red-500 float-right text-white p-2 rounded text-sm w-auto">
                        Delete
                    </button>
                    <button type="button" id="cancelCityDeleteBtn"
                            class="bg-gray-500 float-right text-white p-2 rounded text-sm w-auto mx-4">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8 flex flex-col my-4">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="py-3 pl-4 pr-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500 sm:pl-6">
                                Id
                            </th>
                            <th scope="col"
                                class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">
                                Name
                            </th>
                            <th scope="col"
                                class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">
                                Departures
                            </th>
                            <th scope="col"
                                class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">
                                Arrivals
                            </th>
                            <th scope="col" class="relative py-3 pl-3 pr-4 sm:pr-6">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{--    {{$cities->links()}}--}}
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>


<script>
    $(document).ready(function () {
        fetchcities();

        function fetchcities() {
            $.ajax({
                type: "GET",
                url: "/fetch-cities",
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    $('tbody').html("");
                    $.each(response.cities, function (key, item) {
                        $('tbody').append('<tr>\
                            <td id="item_id" class="item_id whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">' + item.id + '</td>\
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">' + item.name + '</td>\
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">' + item.departures.length + '</td>\
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">' + item.arrivals.length + '</td>\
                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">\
                            <button type="button" id="editcitybtn" class="editcitybtn text-indigo-600 hover:text-indigo-900 mx-4" value="' + item.id + '">Edit</button>\
                            <button type="button" id="deletecitybtn" class="deletecitybtn text-indigo-600 hover:text-indigo-900" value="' + item.id + '">Delete</button></td>\
                    </tr>');
                    });
                }
            });
        }

        $(document).on('click', '.add_city', function (e) {
            e.preventDefault();

            // $(this).text('Sending..');

            let data = {
                'name': $('#create_name').val(),
            }
            // console.log(data);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            //
            $.ajax({
                type: "POST",
                url: "/cities",
                data: data,
                dataType: "json",
                success: function (response) {
                    if (response.status == 400) {
                        $('#save_msgList').html("");
                        $('#save_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#save_msgList').append('<li>' + err_value + '</li>');
                        });
                        // $('.add_student').text('Save');
                    } else {
                        $('#save_msgList').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#createCityModal').find('input').val('');
                        $('.add_city').text('Save');
                        document.getElementById('createCityModal').classList.add('hidden');
                        fetchcities();
                    }
                }
            });
        });

        // Edit city
        $(document).on('click', '.editcitybtn', function (e) {
            e.preventDefault();
            let city_id = $(this).val();
            // console.log(city_id);

            // alert(stud_id);
            document.getElementById('editCityModal').classList.remove('hidden');
            $.ajax({
                type: "GET",
                url: "/edit-city/" + city_id,
                success: function (response) {
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.message);
                        // console.log(response);
                        // document.getElementById('editCityModal').classList.add('hidden');
                    } else {
                        // console.log(response);
                        // console.log(response.city.name);
                        $('#edit_name').val(response.city.name);
                        $('#city_id').val(city_id);
                    }
                }
            });
            $('#editCityModal').find('input').val('');
        });

        //Update city
        $(document).on('click', '.update_city', function (e) {
            e.preventDefault();
            // $(this).text('Updating..');
            let id = $('#city_id').val();
            // console.log(id)

            let data = {
                'name': $('#edit_name').val(),
            }
            // console.log(data)

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/update-city/" + id,
                data: data,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 400) {
                        $('#update_msgList').html("");
                        $('#update_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#update_msgList').append('<li>' + err_value +
                                '</li>');
                        });
                        $('.update_city').text('Update');
                    } else {
                        $('#update_msgList').html("");

                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#editCityModal').find('input').val('');
                        $('.update_city').text('Update');
                        document.getElementById('editCityModal').classList.add('hidden');
                        fetchcities();
                    }
                }
            });

        });

        $(document).on('click', '.deletecitybtn', function () {
            let city_id = $(this).val();
            document.getElementById('deleteCityModal').classList.remove('hidden');
            $('#cityDelete_id').val(city_id);
        });

        $(document).on('click', '.delete_city', function (e) {
            e.preventDefault();

            $(this).text('Deleting..');
            let id = $('#cityDelete_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-city/" + id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 404) {
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('.delete_student').text('Yes Delete');
                    } else {
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('.delete_city').text('Yes Delete');
                        document.getElementById('deleteCityModal').classList.add('hidden');
                        fetchcities();
                    }
                }
            });
        });

    });
</script>


<script>
    let modal = document.getElementById('createCityModal');
    let btn = document.getElementById('addCityButton');
    let cancel_btn = document.getElementById('cancelCityModel');
    let edit_cancel_btn = document.getElementById('cancelCityEditBtn');
    let delete_cancel_btn = document.getElementById('cancelCityDeleteBtn');


    btn.onclick = function () {
        modal.classList.remove('hidden')
    }
    cancel_btn.onclick = function () {
        modal.classList.add('hidden');
        $('#save_msgList').html("");
        $('#save_msgList').append('');
        $('#createCityModal').find('input').val('');

    }
    edit_cancel_btn.onclick = function () {
        document.getElementById('editCityModal').classList.add('hidden')
    }
    delete_cancel_btn.onclick = function () {
        document.getElementById('deleteCityModal').classList.add('hidden')
    }

</script>


