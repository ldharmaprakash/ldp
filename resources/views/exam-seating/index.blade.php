@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/exam-seating.css') }}">
</head>
<div class="container mt-4">
    <h3>Exam Seating</h3>
    <form action="{{ route('exam-seating.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <label for="department" class="form-label">Department</label>
                <select id="department" name="department" class="form-select">
                    <option value="cs">Computer Science</option>
                    <option value="ee">Electrical Engineering</option>
                    <option value="me">Mechanical Engineering</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="year" class="form-label">Year</label>
                <select id="year" name="year" class="form-select">
                    <option value="1">1st Year</option>
                    <option value="2">2nd Year</option>
                    <option value="3">3rd Year</option>
                    <option value="4">4th Year</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="regno_start" class="form-label">Reg No Start</label>
                <input type="number" id="regno_start" name="regno_start" class="form-control" required>
            </div>
            <div class="col-md-3">
                <label for="regno_end" class="form-label">Reg No End</label>
                <input type="number" id="regno_end" name="regno_end" class="form-control" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Add</button>
    </form>
    <div>
        <table id="student-table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Student ID</th>
                    <th>Department</th>
                    <th>Year</th>
                    <th>Batch</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="student-table-body">
                <!-- Data will be populated here using JavaScript -->
            </tbody>
        </table>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Fetch student data using AJAX
            fetch('{{ route('students.get') }}')
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById('student-table-body');
                    tableBody.innerHTML = ''; // Clear existing rows

                    data.forEach((student, index) => {
                        const row = `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${student.name}</td>
                                <td>${student.student_id}</td>
                                <td>${student.department}</td>
                                <td>${student.year}</td>
                                <td>${student.batch}</td>
                                <td>${student.email}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                        `;
                        tableBody.innerHTML += row;
                    });
                })
                .catch(error => console.error('Error fetching student data:', error));
        });
    </script>
    <!-- Main Content -->
    <div class="bench-container">
        <div class="d-flex gap-2 mb-4 justify-content-end" style="height: 30px;">
            <div class="col-12 col-md-3  d-flex align-items-center">
                <label for="roomno" class="form-label me-2 mb-0" style="white-space: nowrap;">Room No</label>
                <input type="number" id="roomno" name="roomno" class="form-control form-control-sm" value="101" readonly>
            </div>
            <div class="col-12 col-md-3  d-flex align-items-center">
                <label for="search" class="form-label me-2 mb-0">Search</label>
                <input type="text" id="search" name="search" class="form-control form-control-sm" placeholder="Search">
            </div>
            <div>
                <button type="submit" class="btn btn-primary btn-sm">Download</button>
            </div>
        </div>
        
        <div class="main-content row g-3 p-2 mt-2" style="background-color:rgb(237, 241, 245);">
            <div class="col-md-4 col-sm-6">
                <div id="bench1" class="bench bench1">
                    <div class="student">
                        <h5>Student 1</h5>
                        <p>Roll No: 001</p>
                    </div>
                    <div class="student">
                        <h5>Student 2</h5>
                        <p>Roll No: 002</p>
                    </div>
                    <div class="student">
                        <h5>Student 3</h5>
                        <p>Roll No: 003</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div id="bench2" class="bench bench2">
                    <div class="student">
                        <h5>Student 4</h5>
                        <p>Roll No: 004</p>
                    </div>
                    <div class="student">
                        <h5>Student 5</h5>
                        <p>Roll No: 005</p>
                    </div>
                    <div class="student">
                        <h5>Student 6</h5>
                        <p>Roll No: 006</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div id="bench3" class="bench bench3">
                    <div class="student">
                        <h5>Student 7</h5>
                        <p>Roll No: 007</p>
                    </div>
                    <div class="student">
                        <h5>Student 8</h5>
                        <p>Roll No: 008</p>
                    </div>
                    <div class="student">
                        <h5>Student 9</h5>
                        <p>Roll No: 009</p>
                    </div>
                </div>
            </div>
            <!-- New Row -->
            <div class="col-md-4 col-sm-6">
                <div id="bench4" class="bench bench4">
                    <div class="student">
                        <h5>Student 10</h5>
                        <p>Roll No: 010</p>
                    </div>
                    <div class="student">
                        <h5>Student 11</h5>
                        <p>Roll No: 011</p>
                    </div>
                    <div class="student">
                        <h5>Student 12</h5>
                        <p>Roll No: 012</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div id="bench5" class="bench bench5">
                    <div class="student">
                        <h5>Student 13</h5>
                        <p>Roll No: 013</p>
                    </div>
                    <div class="student">
                        <h5>Student 14</h5>
                        <p>Roll No: 014</p>
                    </div>
                    <div class="student">
                        <h5>Student 15</h5>
                        <p>Roll No: 015</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div id="bench6" class="bench bench6">
                    <div class="student">
                        <h5>Student 16</h5>
                        <p>Roll No: 016</p>
                    </div>
                    <div class="student">
                        <h5>Student 17</h5>
                        <p>Roll No: 017</p>
                    </div>
                    <div class="student">
                        <h5>Student 18</h5>
                        <p>Roll No: 018</p>
                    </div>
                </div>
            </div>
            <!-- Additional Row -->
            <div class="col-md-4 col-sm-6">
                <div id="bench7" class="bench bench7">
                    <div class="student">
                        <h5>Student 19</h5>
                        <p>Roll No: 019</p>
                    </div>
                    <div class="student">
                        <h5>Student 20</h5>
                        <p>Roll No: 020</p>
                    </div>
                    <div class="student">
                        <h5>Student 21</h5>
                        <p>Roll No: 021</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div id="bench8" class="bench bench8">
                    <div class="student">
                        <h5>Student 22</h5>
                        <p>Roll No: 022</p>
                    </div>
                    <div class="student">
                        <h5>Student 23</h5>
                        <p>Roll No: 023</p>
                    </div>
                    <div class="student">
                        <h5>Student 24</h5>
                        <p>Roll No: 024</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div id="bench9" class="bench bench9">
                    <div class="student">
                        <h5>Student 25</h5>
                        <p>Roll No: 025</p>
                    </div>
                    <div class="student">
                        <h5>Student 26</h5>
                        <p>Roll No: 026</p>
                    </div>
                    <div class="student">
                        <h5>Student 27</h5>
                        <p>Roll No: 027</p>
                    </div>
                </div>
            </div>
            <!-- Additional Row -->
            <div class="col-md-4 col-sm-6">
                <div id="bench10" class="bench bench10">
                    <div class="student">
                        <h5>Student 28</h5>
                        <p>Roll No: 028</p>
                    </div>
                    <div class="student">
                        <h5>Student 29</h5>
                        <p>Roll No: 029</p>
                    </div>
                    <div class="student">
                        <h5>Student 30</h5>
                        <p>Roll No: 030</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div id="bench11" class="bench bench11">
                    <div class="student">
                        <h5>Student 31</h5>
                        <p>Roll No: 031</p>
                    </div>
                    <div class="student">
                        <h5>Student 32</h5>
                        <p>Roll No: 032</p>
                    </div>
                    <div class="student">
                        <h5>Student 33</h5>
                        <p>Roll No: 033</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div id="bench12" class="bench bench12">
                    <div class="student">
                        <h5>Student 34</h5>
                        <p>Roll No: 034</p>
                    </div>
                    <div class="student">
                        <h5>Student 35</h5>
                        <p>Roll No: 035</p>
                    </div>
                    <div class="student">
                        <h5>Student 36</h5>
                        <p>Roll No: 036</p>
                    </div>
                </div>
            </div>
            <!-- Additional Row -->
            <div class="col-md-4 col-sm-6">
                <div id="bench13" class="bench bench13">
                    <div class="student">
                        <h5>Student 37</h5>
                        <p>Roll No: 037</p>
                    </div>
                    <div class="student">
                        <h5>Student 38</h5>
                        <p>Roll No: 038</p>
                    </div>
                    <div class="student">
                        <h5>Student 39</h5>
                        <p>Roll No: 039</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div id="bench14" class="bench bench14">
                    <div class="student">
                        <h5>Student 40</h5>
                        <p>Roll No: 040</p>
                    </div>
                    <div class="student">
                        <h5>Student 41</h5>
                        <p>Roll No: 041</p>
                    </div>
                    <div class="student">
                        <h5>Student 42</h5>
                        <p>Roll No: 042</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div id="bench15" class="bench bench15">
                    <div class="student">
                        <h5>Student 43</h5>
                        <p>Roll No: 043</p>
                    </div>
                    <div class="student">
                        <h5>Student 44</h5>
                        <p>Roll No: 044</p>
                    </div>
                    <div class="student">
                        <h5>Student 45</h5>
                        <p>Roll No: 045</p>
                    </div>
                </div>
            </div>
            <div>
                <nav class="mt-2 mb-4">
                    <ul class="pagination d-flex justify-content-end align-items-center mb-0">
                        <li class="page-item">
                            <a class="page-link" href="#" id="prevButton">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" id="nextButton" style="white-space:nowrap">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div> <!-- End of bench-container -->
    
</div>
@endsection


