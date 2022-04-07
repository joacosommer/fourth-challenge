<!doctype html>

<title>Fourth Challenge</title>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<meta name="csrf-token" content="{{csrf_token()}}">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
{{--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">--}}


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
            <h1 class="text-xl font-semibold text-gray-900">Airlines</h1>
            <p class="mt-2 text-sm text-gray-700">A list of all the airlines including their id, name, description
                and number of flights</p>
        </div>


        <button type="button" id="addAirlineButton"
                class="mt-3 w-full inline-flex items-center justify-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            Add airline
        </button>
        {{--Create button--}}
        <div class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog"
             aria-modal="true"
             id="createAirlineModal">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div
                    class="relative inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
                    <div class="w-full sm:max-w-xs">
                        <div>
                            <label for="text" class="block text-2xl font-medium text-gray-700 text-center">Create Airline</label>
                            <label for="text" class="block text-sm font-medium text-gray-700 font-bold">Airline Name</label>
                            <div class="mt-1">
                                <input type="text" name="createAirline_name" id="createAirline_name"
                                       class="pb-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <ul class="text-red-500 pb-2" id="save_msgList"></ul>
                            <label for="text" class="block text-sm font-medium text-gray-700 font-bold">Airline Description</label>
                            <div class="mt-1">
                                <input type="text" name="createAirline_description" id="createAirline_description"
                                       class="pb-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <label for="text" class="block text-sm font-medium text-gray-700 font-bold">Add Cities</label>
                            <div id="checkboxCities" class="container mt-1 border-gray-300 rounded-md">
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="add_airline_save"
                            class="add_airline mt-1 float-right bg-blue-500 text-white p-2 rounded text-sm w-auto rig">
                        Save
                    </button>
                    <button type="button" id="cancelAirlineModel"
                            class="float-right mt-1 bg-gray-500 text-white p-2 rounded text-sm w-auto mx-4">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
        {{--Edit button--}}
        <div class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog"
             aria-modal="true"
             id="editAirlineModal">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div
                    class="relative inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
                    <div class="w-full sm:max-w-xs">
                        <div>
                            <label for="text" class="block text-2xl font-medium text-gray-700 text-center">Edit Airline</label>
                            <label for="text" class="block text-sm font-medium text-gray-700 font-bold">Airline Name</label>
                            <div class="mt-1">
                                <input type="text" name="editAirline_name" id="editAirline_name"
                                       class="pb-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <ul class="text-red-500 pb-2" id="save_msgList_Edit"></ul>
                            <label for="text" class="block text-sm font-medium text-gray-700 font-bold">Airline Description</label>
                            <div class="mt-1">
                                <input type="text" name="editAirline_description" id="editAirline_description"
                                       class="pb-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <label for="text" class="block text-sm font-medium text-gray-700 font-bold">Add Cities</label>
                            <div id="checkboxCitiesEdit" class="container mt-1 border-gray-300 rounded-md">
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="update_airline"
                            class="update_airline mt-1 float-right bg-blue-500 text-white p-2 rounded text-sm w-auto rig">
                        Save
                    </button>
                    <button type="button" id="editCancelAirlineModel"
                            class="float-right mt-1 bg-gray-500 text-white p-2 rounded text-sm w-auto mx-4">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
        {{--Delete Modal--}}
        <div class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog"
             aria-modal="true"
             id="deleteAirlineModal">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div
                    class="relative inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
                    <div class="w-full sm:max-w-xs pb-2">
                        <div>
                            <div class="pb-2">
                                <label for="text" class="block text-2xl font-medium text-gray-700 text-center">Confirm delete Airline?</label>
                            </div>
                            <label for="text" class="block text-sm font-medium text-gray-700 font-bold">Airline Id</label>
                            <input type="text" name="airlineDelete_id" id="airlineDelete_id" disabled
                                   class="pb-2 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">

                            <ul class="text-red-500" id="delete_msgList"></ul>
                        </div>
                    </div>
                    <button type="submit" id="delete_airline"
                            class="delete_airline bg-red-500 float-right text-white p-2 rounded text-sm w-auto">
                        Delete
                    </button>
                    <button type="button" id="cancelAirlineDeleteBtn"
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
                    <table id="tableAirline" class="table min-w-full divide-y divide-gray-300">
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
                                Description
                            </th>
                            <th scope="col"
                                class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">
                                # Flights
                            </th>
                            <th scope="col" class="relative py-3 pl-3 pr-4 sm:pr-6">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody id="tableAirlinesBody" class="divide-y divide-gray-200 bg-white">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script>
    fetchairlines();
    function fetchairlines() {
        const tableBody = document.querySelector('#tableAirlinesBody');
        fetch('/fetch-airlines').then(response => response.json()).then(data => {
            tableBody.innerHTML = "";
            const airlines = data.airlines;
            for (let airline of airlines) {
                let cellElement = '<tr>\
                                <td id="item_id" class="item_id whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">' + airline.id + '</td>\
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">' + airline.name + '</td>\
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">' + airline.description + '</td>\
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">' + airline.flights.length + '</td>\
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">\
                                <button type="button" id="editAirlineBtn" class="editAirlineBtn text-indigo-600 hover:text-indigo-900 mx-4" editbutton value="' + airline.id + '">Edit</button>\
                                <button type="button" id="deleteAirlinebtn" class="deleteAirlinebtn text-indigo-600 hover:text-indigo-900" value="' + airline.id + '">Delete</button></td>\
                        </tr>';
                tableBody.innerHTML += cellElement;
            }
            ;
        });
    }

    function fetchcities() {
        const checkboxBody = document.querySelector('#checkboxCities');
        fetch('/fetch-cities').then(response => response.json()).then(data => {
            checkboxBody.innerHTML = "";
            const cities = data.cities;
            for (let city of cities) {
                let cellElement = `<input type="checkbox" class="checkboxCity" value="` + city.name+ `" /><span class="ml-2">`+ city.name +`</span><br />`;
                checkboxBody.innerHTML += cellElement;
            }
            ;
        });
    }

    document.getElementById('add_airline_save').onclick = function () {
        let dataJson = arrayChk();
        // console.log(dataJson)
        fetch('/airlines', {
            method: 'POST',
            body: dataJson, // data can be `string` or {object}!
            headers:{
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
            }
        }).then(res => res.json())
        .then(response =>  {
            if(response.status == 400){
                document.getElementById('save_msgList').innerText = '';
                document.getElementById('save_msgList').append(response.errors.name);
            }else {
                document.getElementById('createAirline_description').value = '';
                document.getElementById('createAirline_name').value = '';
                document.getElementById('createAirlineModal').classList.add('hidden');
            }
            });
        fetchairlines();
    }

    function arrayChk(){
        let arrAn = [];
        let m = document.getElementsByClassName('checkboxCity');
        let arrLen = m.length;
        let airlineName = document.getElementById('createAirline_name').value;
        arrAn.push( { "name" : airlineName } );
        let airlineDescription = document.getElementById('createAirline_description').value;
        arrAn.push( { "airlineDescription" : airlineDescription } );
        for ( let i= 0; i < arrLen ; i++){
            let  w = m[i];
            if (w.checked){
                arrAn.push( { "city" : w.value } );
            }
        }
        let myJsonString = JSON.stringify(arrAn);
        return myJsonString;
    }



    let modal = document.getElementById('createAirlineModal');
    let btn = document.getElementById('addAirlineButton');
    btn.onclick = function () {
        fetchcities();
        modal.classList.remove('hidden')
    }

    let edit_id;
    // Edit Modal
    $(document).on('click', '.editAirlineBtn', function (e) {
        e.preventDefault();
        let airline_id = $(this).val();
        edit_id = airline_id;
        document.getElementById('editAirlineModal').classList.remove('hidden');
        // $('#editCityModal').find('input').val('');
        let url = "/edit-airline/" + airline_id;
        fetch(url).then(response => response.json()).then(data => {
            fetchcitiesEdit(data.airline.cities);
            document.getElementById('editAirline_name').value = data.airline.name;
            document.getElementById('editAirline_description').value = data.airline.description;
            ;
        });
    });

    function fetchcitiesEdit(checkedCities) {
        const checkboxBody = document.querySelector('#checkboxCitiesEdit');
        fetch('/fetch-cities').then(response => response.json()).then(data => {
            checkboxBody.innerHTML = "";
            const cities = data.cities;
            let citiesArray = [];
            for (let city of checkedCities){
                 citiesArray.push(city.id);
            }
            for (let city of cities) {
                let cellElement;
                if (citiesArray.includes(city.id)){
                    cellElement = `<input type="checkbox" checked class="checkboxCityEdit" value="` + city.name+ `" /><span class="ml-2">`+ city.name +`</span><br />`;
                } else {
                    cellElement = `<input type="checkbox"  class="checkboxCityEdit" value="` + city.name + `" /><span class="ml-2">` + city.name + `</span><br />`;
                }
                checkboxBody.innerHTML += cellElement;
            }
            ;
        });
    }

    document.getElementById('update_airline').onclick = function () {
        let dataJson = arrayChkEdit();
        const url = '/update-airline/' + edit_id;
        fetch(url, {
            method: 'PUT',
            body: dataJson, // data can be `string` or {object}!
            headers:{
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
            }
        }).then(res => res.json())
            .then(response =>  { if(response.status == 400){
                document.getElementById('save_msgList_Edit').innerText = '';
                document.getElementById('save_msgList_Edit').append(response.errors.name);
            }else {
                document.getElementById('editAirline_description').value = '';
                document.getElementById('editAirline_name').value = '';
                document.getElementById('editAirlineModal').classList.add('hidden');
            }
            });

        fetchairlines();
    }

    function arrayChkEdit(){
        let arrAn = [];
        let m = document.getElementsByClassName('checkboxCityEdit');
        let arrLen = m.length;
        let airlineName = document.getElementById('editAirline_name').value;
        arrAn.push( { "name" : airlineName } );
        let airlineDescription = document.getElementById('editAirline_description').value;
        arrAn.push( { "airlineDescription" : airlineDescription } );
        for ( let i= 0; i < arrLen ; i++){
            let  w = m[i];
            if (w.checked){
                arrAn.push( { "city" : w.value } );
            }
        }
        let myJsonString = JSON.stringify(arrAn);
        return myJsonString;
    }

    $(document).on('click', '.deleteAirlinebtn', function (e) {
        e.preventDefault();
        let airline_id = $(this).val();
        console.log(airline_id);
        document.getElementById('deleteAirlineModal').classList.remove('hidden');
        $('#airlineDelete_id').val(airline_id);
    });

    document.getElementById('delete_airline').onclick = function () {
        const delete_id = document.getElementById('airlineDelete_id').value;
        const url = '/delete-airline/' + delete_id;
        fetch(url, {
            method: 'DELETE',
            headers:{
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
            }
        }).then(res => res.json())
            .then(response =>  { if(response.status == 400){
                document.getElementById('save_msgList_Edit').innerText = '';
                document.getElementById('save_msgList_Edit').append(response.errors.name);
            }else {
                document.getElementById('deleteAirlineModal').classList.add('hidden');
            }
            });

        fetchairlines();
    }

    let cancel_btn = document.getElementById('cancelAirlineModel');
    cancel_btn.onclick = function () {
        modal.classList.add('hidden');
        document.getElementById('save_msgList').innerHTML = '';
        document.getElementById('save_msgList').append('');
        document.getElementById('createAirline_description').value = '';
        document.getElementById('createAirline_name').value = '';
    }

    let cancel_btn_edit = document.getElementById('editCancelAirlineModel');
    cancel_btn_edit.onclick = function () {
        document.getElementById('editAirlineModal').classList.add('hidden');
    }


    let edit_cancel_btn = document.getElementById('cancelCityEditBtn');
    let delete_cancel_btn = document.getElementById('cancelAirlineDeleteBtn');

    delete_cancel_btn.onclick = function () {
        document.getElementById('deleteAirlineModal').classList.add('hidden')
    }

</script>

</body>
