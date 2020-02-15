/*To Do List / MyPlans*/
/*task events */
$(document).on('click', 'label[data-id]', function() {

    var id = $(this).attr('data-id');
    load_data(id);

    function load_data(id = "") {
        $.ajax({
            url: "{{ route('admin.ToDoList_check') }}",
            method: "GET",
            data: {
                id: id
            },
            success: function(data) {
                window.location.reload();
            }
        })

    }

});

/*restore button */
$(document).on('click', 'button[data-id]', function() {

    var id = $(this).attr('data-id');
    load_data(id);

    function load_data(id = "") {
        $.ajax({
            url: "{{ route('admin.ToDoList_restore') }}",
            method: "GET",
            data: {
                id: id
            },
            success: function(data) {
                /*reload page*/
                //window.location = window.location.href.split("?")[0];
                window.location.reload();
            }
        })

    }

});

/*delete button */
$(document).on('click', 'button[del-id]', function() {

    var id = $(this).attr('del-id');

    load_data(id);

    function load_data(id = "") {
        $.ajax({
            url: "{{ route('admin.fullcalendar_destroy') }}",
            method: "GET",
            data: {
                id: id
            },
            success: function(data) {

                //  window.location.reload();
            }
        })

    }

});

/*toggle page title if admin have new message*/
$(function() {
    var count = {
        {
            $notfiy
        }
    }; //  meesages count
    if (count > 0) {

        var cont = 0;
        setInterval(function() {
            if (cont % 2) {
                var title = $('#message_notif').html(); //in header blade
            } else {
                var title = $('#page_name').html();
            }
            cont++;
            document.title = title; //change title name
        }, 1000);
    }
});

/*get notfiy  of new messages number from route function in web url notifyMessage
for header admin*/
$(document).ready(function() {

    function load_data() {
        $.ajax({
            url: "{{ url('notifyMessage') }}",
            method: "GET",
            error: function() {
                // will fire when timeout is reached
            },
            success: function(data) {
                if (data > 0) {

                    document.getElementById("result").innerHTML = data;
                    //change title if new message
                    document.title = '(' + data + ')' + ' ' + 'New Message...';
                    //message_notif for title
                    document.getElementById("message_notif").innerHTML = '(' + data + ')' + ' ' + 'New Message...';
                }
                document.getElementById("notfiy").innerHTML = data;

            },
            timeout: 2000 // sets timeout to 3 seconds
        });
    }


    //get new message for admin header in Contacts_MessageController

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    load();

    function load() {
        $.ajax({
            url: "{{ url('getNewMessage') }}",
            method: "POST",
            data: {
                _token: CSRF_TOKEN
            },
            error: function() {
                // will fire when timeout is reached
            },
            success: function(data) {
                $('#mm').html(data);
                //document.getElementById("mm").innerHTML = data;
            },

        });
    }


    //get news in admin dashboard
    function GetNews() {

        $.ajax({
            url: "{{ url('ajaxGetNews') }}",
            method: "POST",
            data: {
                _token: CSRF_TOKEN
            },

            error: function() {
                // will fire when timeout is reached
            },
            success: function(data) {
                //console.log(data);
                $('#news').html(data);

                //document.getElementById("mm").innerHTML = data;
            },

        });
    }

    //for get data quickly
    setTimeout(function() {
        load();
        load_data();
        GetNews();
    }, 1000);

    //function load every 25 seconds
    myVar = setInterval(function() {
        load();
        load_data();
        GetNews();
    }, 25000);

});
