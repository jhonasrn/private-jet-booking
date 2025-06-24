@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold text-center text-gray-800 dark:text-gray-100 mt-10 mb-6" style="margin-top: 10px;">
        Flight Reports Summary 📊
    </h2>

    <div class="space-y-12 max-w-6xl mx-auto px-4">
        </br>
        @include('admin.reports.unassigned-table', ['unassignedTotals' => $unassignedTotals])
        </br>
        @include('admin.reports.completed-table', ['groupedTotals' => $completedTotals])
        </br>    
        @include('admin.reports.assigned-table', ['groupedTotals' => $assignedTotals])
        </br>
        @include('admin.reports.jet-table', ['jetTotals' => $jetTotals])

    </div>
@endsection

