@extends('layouts.master') 
@section('content')



<div class="container" style="padding-top:80px; padding-bottom: 50px;">
    <div class="row">
        <div class="col-lg-3" style="padding-top: 100px;" id="sticky-navbar">

            <nav class="navbar navbar-light bg-light" id="sticky">

                <!-- Links -->
                <ul class="navbar-nav mx-auto">


                    <li class="nav-item">
                        <a class="nav-link" href="#">Project</a>

                        <ul class="sidebarnav">
                            <li><a href="#adding">Adding</a>
                            </li>
                            <li><a href="#deleting">Deleting</a>
                            </li>
                            <li>
                                <a href="#updating">Updating</a>
                            </li>
                            <li>
                                <a href="#bulkdelete">Bulk Delete</a>

                            </li>

                        </ul>
                    </li>


                    @if(Auth::user()->role->name=="Admin")
                    <li class="nav-item">
                        <a class="nav-link" href="#">User</a>

                        <ul class="sidebarnav">
                            <li><a href="#addUser">Add User</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>

            </nav>
        </div>
        <div class="col-lg-9" id="centered-text">
            <div>
                <img src="/img/Paper-Plane.png" alt="Quick Start" width="70px;">
                <h1 style="color: rgb(5, 4, 88); display:inline-block;" class="px-3"> Quick Start</h1>
                <br>
                <br>
                <p>Below is the step by step guide to the Climate Justice Map Web page</p>
                <br>

                <h4>Project</h4>
                <div style="margin-left:5%;">
                    <h6 id="adding">To add a project</h6>
                    <div style="margin-left:5%;">
                        <p>
                            In the Project list, select <a href="/addproject" target="_blank" class="btn btn-primary btn-text"><img src="/img/Add-New.png" alt="" class="img-buttons" width="20px"> Add project  </a>                            then fill out all required fields


                        </p>
                        <br>
                        <img src="/img/adding.png" alt="Adding" width="100%;">
                        <br>
                        <br>
                        <p>Choose an appropriate category for the project.</p>
                        <ul>
                            <li>Mangrove</li>
                            <li>Reforestation</li>
                            <li>Micro Hydro Powerplant</li>
                            <li>Renewable Energy</li>
                            <li>Sustainable Agriculture</li>
                            <li>Urban Agriculture</li>
                            <li>Urban Environment</li>
                        </ul>

                        <br>

                        <p>Click the magnifying glass icon then type the location/address of the project specified</p>

                        <img src="/img/mapdocs.png" alt="Adding" width="100%;">
                        <br>
                        <br>
                        <p>Data on latitude and longitude locations will be automatically filled after typing project location. You can manually drag the marker if you think the position is incorrect. </p>
                 
                        <p></p>
                        <img src="/img/mapdocs2.png" alt="Adding" width="100%;">
                        <br>
                        <br>
                        <p>Fill out body field with the project salient points</p>
                        <p><b>Make sure to resize all the pictures indicated in the body field for mobile responsiveness</b></p>
                        <img src="/img/body.png" alt="Adding" width="100%;">
                        <p>IIf an image is available, you can upload it by clicking "choose file"</p>
                        <pre>The image must be less than 1mb</pre>
                        <p>Then click "Submit"</p>
                        <img src="/img/addSubmit.png" alt="Adding" width="100%;">
                        <br>
                        <br>
                    </div>







                </div>


                <h6 id="delete">Deleting</h6>
                <div style="margin-left:5%;">
                    <img src="/img/deleteOne.png" alt="Deleting" width="100%">
                    <br>
                    <br>
                    <p>To delete a specific project, press the red delete button </p>
                    <p>then click "Delete Record" button</p>
                    <br>
                    <img src="/img/deleteConfirm.png" alt="Deleting" width="100%">
                </div>
                <br>
                <br>
                <h6 id="updating">Updating</h6>
                <div style="margin-left:5%;">

                    <br>
                    <p>To update a specific project, press the edit button</p>
                    <br>

                    <img src="/img/deleteOne.png" alt="Edit" width="100%">
                    <p>Then simply change all the field that needs updating or editing</p>
                    <img src="/img/edit.png" alt="Edit" width="100%">
                    <p>click "Update" to save changes</p>
                    <p>click cancel if you want to discard all the changes you have made</p>
                    <img src="/img/update.png" alt="Edit" width="100%">
                </div>
                <br>
                <br>
                <h6 id="bulkdelete">Bulk Delete</h6>
                <div style="margin-left:5%;">
                    <br>
                    <p>To bulk delete, check all the projects that you want to delete.</p>
                    <p>To check all, click the checkbox in the header of the table</p>
                    <img src="/img/bulkDelete.png" alt="bulkDelete" width="100%">
                    <br>
                    <br>
                    <p>then simply click "Delete Checked"</p>
                    <img src="/img/deleteChecked.png" alt="deletechecked" width="100%">
                    <br>
                    <br>
                    <p>then confirm it by clicking "Yes"</p>
                    <img src="/img/deleteCheckConfirm.png" alt="" width="100%">
                </div>


            </div>
            @if(Auth::user()->role->name=="Admin")
            <h4 id="addUser">User</h4>
            <div style="margin-left:5%;">
                <h6>Add User</h6>
                <div style="margin-left:5%;">
                 <p>Only this admin account can add moderators.</p>
                 <p>To add moderators click "Project" in the navigation bar then click "Moderators".</p>
                <img src="/img/moderators.png" alt="" width="100%">
                <br>
                <br>
                <p>then click "Add Moderator" </p>

                <img src="/img/addModerator.png" alt="" width="100%">
                <p>Fill up all the fields (Name, Email, Category, Passowrd, Confirm Password).</p>
                <img src="/img/addModeratorForm.png" alt="" width="100%">
                <br>
                <br>
                <p>click "Register" to save</p>
                <img src="/img/addModeratorFormRegister.png" alt="" width="100%">
                </div>

            </div>
            @endif
        </div>
    </div>
</div>
@endsection