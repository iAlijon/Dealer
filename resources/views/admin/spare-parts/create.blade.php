@extends('adminlte::page')

@push('css')
    <style>
        /*.disBlock{*/
        /*display: none !important;*/
        /*}*/

        #img_container {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
        }

        .image {
            width: 150px;
            margin: 5px;
        }

        .hidden {
            position: absolute;
            display: none;
            left: -9999px;
        }
        .img_block {
            position: relative;
        }
        .img_label {
            display: block;
            cursor: pointer;
        }

        .plus {
            width: 50px;
            height: 50px;
            font-size: 25px;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2060FF;
        }
        .plus:after {
            content: '+';
        }

        .cross {
            width: 15px;
            height: 15px;
            font-size: 20px;
            font-weight: bold;
            background-color: rgba(255,255,255,0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #FF2060;
            position: absolute;
            top: 5px;
            right: 5px;
            cursor: pointer;
        }
        .cross:hover {
            background-color: rgba(255,255,255,0.6);
        }
        .cross:after {
            content: 'x';
        }
        #placeholder{
            width: 100px;
            height: 100px;
            text-align: center;
        }
    </style>
@endpush
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Extiyot qsim qo'shish</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-outline card-info">
                    <div class="card-header">

                    </div>
                    <form action="{{route('spare-parts.create')}}" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            @csrf
                            <div class="form-group">
                                <label>Kategoriyasi</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">---</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name_uz }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Nomi</label>
                                <input type="text" name="name_uz" placeholder="Name..." class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Narxi</label>
                                <input type="text" name="price" placeholder="Name..." class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Rasm</label>
                                <div id="img_container">
                                    <div id="placeholder">
                                        <label class="img_label" for="placeholder_input">
                                            <div class="plus"></div>
                                        </label>
                                        <input type='file' id="placeholder_input" class="hidden" accept="image/*" onchange='openFiles(event)' multiple>
                                    </div>
                                </div>
                            </div>

{{--                            <div class="form-group" id="disBlock">--}}
{{--                                <label>Rasm</label>--}}
{{--                                <input type="file" class="form-control" name="photo">--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <label>Bir nechta rasm tanlayszmi</label>--}}
{{--                                <br>--}}
{{--                                <input type="checkbox" id="checkbox" name="checkbox">--}}
{{--                            </div>--}}
{{--                            <div id="img_container">--}}
{{--                                <div id="placeholder">--}}
{{--                                    <div class="form-group d-none">--}}
{{--                                        <label>Rasm 1</label>--}}
{{--                                        <input type="file" name="photo_1" class="form-control">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group d-none">--}}
{{--                                    <label>Rasm 2</label>--}}
{{--                                    <input type="file" name="photo_2" class="form-control">--}}
{{--                                </div>--}}

{{--                                <div class="form-group d-none">--}}
{{--                                    <label>Rasm 3</label>--}}
{{--                                    <input type="file" name="photo_3" class="form-con trol">--}}
{{--                                </div>--}}

{{--                                <div class="form-group d-none">--}}
{{--                                    <label>Rasm 4</label>--}}
{{--                                    <input type="file" name="photo_4" class="form-control">--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="form-group" id="mulImg">
                                <label>To'liq ma'lumot</label>
                                <textarea class="summernote" name="info"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        $('.summernote').summernote({
            height: 150
        });

        // $('#checkbox').click(function (){
        //     let disBlock = document.getElementById('disBlock');
        //     console.log(disBlock);
        //     if ($(this).is(':checked')){
        //         disBlock.classList.add('disBlock')
        //     }
        // })
        var container = document.getElementById('img_container');
        var placeholder = document.getElementById('placeholder');

        // utility function doing both createElement and setAttributes
        function create(elementName, attributes) {
            var elem = document.createElement(elementName);
            if (typeof attributes === 'object') {
                Object.keys(attributes).forEach(function(attributeName) {
                    elem.setAttribute(attributeName, attributes[attributeName]);
                });
            }
            return elem;
        }

        // load a file image as a data url and callback with this data url
        function loadImage(file, callback) {
            var reader = new FileReader();
            reader.onload = function(){
                var dataURL = this.result;
                callback(dataURL);
            };
            reader.readAsDataURL(file);
        }

        // self explainatory
        function createAndInsertNewImageBlock(id, dataURL) {
            var output = create('div', { 'class': 'img_block' });

            // image label, linked to the file input through their for/id attributes
            var label = create('label', { 'for': id, 'class': 'img_label' });
            var img = create('img', { 'class': 'image', src: dataURL });
            label.appendChild(img);
            output.appendChild(label);

            // single file input triggered by the image label, it is hidden
            var input = create(
                'input',
                {
                    'type': 'file',
                    'class': 'hidden',
                    'accept': 'image/*',
                    id: id
                }
            );
            // load single data url on change and change the image src
            input.addEventListener('change', function() {
                loadImage(this.files.item(0), function(data) {
                    img.src = data;
                });
            });
            output.appendChild(input);

            // delete block button
            var cross = create('div', { 'class': 'cross' });
            cross.addEventListener('click', function() {
                output.remove();
            });
            output.appendChild(cross);

            // insert new image block just before the '+' placeholder
            container.insertBefore(output, placeholder);
        }

        // handler for the onChange event of the placeholder's file input
        function openFiles(evt) {
            var files = evt.target.files;
            for (let i = 0; i < files.length; i++) {
                var file = files.item(i);
                loadImage(file, function(dataURL){
                    var count = container.children.length;
                    // lame unique id generation for linking label to input
                    var id = 'img(' + count + '/' + (Date.now()).toString(16) + ')' + file.name;
                    createAndInsertNewImageBlock(id, dataURL);
                });
            };

        };
    </script>
@endpush
