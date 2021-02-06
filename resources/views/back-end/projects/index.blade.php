@extends('back-end.layout.app')

@php

@endphp
@section('title')
    @lang('site.'.$module_name_plural)
@endsection

@section('content')

    @component('back-end.layout.nav-bar')

        @slot('nav_title')
            @lang('site.'.$module_name_plural)
        @endslot

    @endcomponent

    @component('back-end.partial.table', ['module_name_plural'=>$module_name_plural , 'module_name_singular'=>$module_name_singular])
        @slot('add_button')
            <div class="col-md-4 text-right">
                <a href="{{route($module_name_plural.'.create')}}" class="btn btn-white btn-round ">
                    @lang('site.add') @lang('site.'.$module_name_singular)
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
                        @lang('site.title')
                    </th>
                    <th>
                        @lang('site.price')
                    </th>
                    <th>
                        @lang('site.category')
                    </th>
                    <th>
                        @lang('site.tag')
                    </th>
                    <th>
                        @lang('site.image')
                    </th>
                    <th>
                        @lang('site.description')
                    </th>


                    <th class="text-right">
                        @lang('site.actions')
                    </th>
                </tr></thead>
                <tbody>

                @foreach($rows as $index=>$row)

                    <tr>

                        <td>
                            {{++$index}}
                        </td>

                        <td>
                            {{$row->title}}
                        </td>

                        <td>
                            {{$row->price}}
                        </td>
                        
                        <td>
                            @if($row->category)
                                {{$row->category->name}}
                            @endif
                        </td>

                        <td>
                            @if($row->tag)
                                {{$row->tag->name}}
                            @endif
                        </td>

                        <td>
                            <img  src="{{ asset('uploads/project_images/'. $row->image)}}" width="100px" height="60px" class="img-thumbnail img-preview">
                        </td>

                        <td>
                            {{$row->description}}
                        </td>


                        <td class="td-actions text-right">
                            @include('back-end.buttons.images')
                            @include('back-end.buttons.edit')
                            @include('back-end.buttons.delete')
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            {{$rows->links()}}
        </div>

    @endcomponent

@endsection

