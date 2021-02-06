@extends('back-end.layout.app')

@php

@endphp
@section('title')
    @lang('site.image')
@endsection

@section('content')

    @component('back-end.layout.nav-bar')

        @slot('nav_title')
            @lang('site.image')
        @endslot

    @endcomponent

    @component('back-end.partial.table', ['module_name_plural'=>'images' , 'module_name_singular'=>'project'])
        @slot('add_button')
            <div class="col-md-4 text-right">
                <a href="{{route('projects.createImages', $id)}}" class="btn btn-white btn-round ">
                    @lang('site.add') @lang('site.image')
                </a>
            </div>
        @endslot

        <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                <tr><th>
                        @lang('site.id')
                    </th>

                    <th>
                        @lang('site.image')
                    </th>
                    <th class="text-right">
                        @lang('site.actions')
                    </th>
                </tr></thead>
                <tbody>

                @foreach($rows as $row)

                    <tr>

                        <td>
                            {{$row->id}}
                        </td>

                        <td>
                            <img alt="Architectural design Architicts Design" src="{{isset($row) ? asset('uploads/project_images/'. $row->image) : asset('uploads/project_images/default.png')}}" width="100px" height="60px" class="img-thumbnail img-preview">
                        </td>

                        <td class="td-actions text-right">
                            <a href="{{route('projects.editImages', $row)}}" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="@lang('site.edit') @lang('site.image')">
                                <i class="material-icons">edit</i>
                            </a>

                            <form action="{{route('projects.destroyImage', $row)}}" method="POST" style="display: inline-block">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm delete" data-original-title="@lang('site.delete') @lang('site.image')">
                                    <i class="material-icons">close</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {{$rows->links()}}
        </div>

    @endcomponent

@endsection

