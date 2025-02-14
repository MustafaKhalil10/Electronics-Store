@extends('layout.dashboard')

@section('title')
    dashboard
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">index</li>
@endsection

@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-4xl font-semibold text-center text-gray-800 mb-5 mt-5">لوحة التحكم - إحصائيات</h1>

        <!-- الإحصائيات العامة -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="bg-white shadow-xl rounded-xl p-8 col-md-4 mt-3" style="width: 100px">
                    <h2 class="text-xl font-bold text-center text-gray-800">الفئات</h2>
                    <canvas id="ageGroupsChart" style="width: 200px"></canvas>
                </div>
                <div class="col-md-1"></div>

                <div class="col-md-6 mb-3" style="max-width: 400px; margin: auto; padding: 20px;">
                    <h2 class="text-xl font-bold text-center text-gray-800">ملخص عام للمنتجات</h2>
                    <canvas id="simpleChart"></canvas>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-xl rounded-xl p-8 mt-6">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">الإيرادات</h2>
            <canvas id="financialChart"></canvas>
        </div>
    @endsection

    @push('styles')
        <style>
            .chart-container {
                position: relative;
                width: 100%;
                height: 200px;
            }
        </style>
    @endpush
    @push('scripts')
    @endpush
