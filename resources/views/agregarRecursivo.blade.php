
@foreach ($archivos->sortBy('tipo') as $archivo)
               
                @if ($archivo->tipo=='archivo')

                    @if (Auth::user()->carrera_id!= NULL )
                        
                        @if ($archivo->carrera_id==Auth::user()->carrera_id)
                            <tr class="border-2 border-y-black border-x-white {{$id_folder}}" style="display:none;">
                                <th class="font-thin text-xl"><span class="material-symbols-outlined font-extralight text-3xl text-right cursor-pointer">picture_as_pdf</span></th>
                                <th class="font-thin text-xl text-left"><a href="{{ asset($archivo->url) }}">{{$archivo->nombre}}</a></th>
                                <th>
                                <div class="grid grid-cols-3">
                                    <span class="material-symbols-outlined font-extralight text-3xl text-right cursor-pointer" ><a href="{{ asset($archivo->url) }}"> visibility</a></span>
                                    <span class="material-symbols-outlined font-extralight text-3xl cursor-pointer">delete</span>
                                    
                                </div>
                                </th>
                            </tr>
                        @endif
                    
                    
                    @else
                
                        <tr class="border-2 border-y-black border-x-white {{$id_folder}}" style="display:none;">
                            <th class="font-thin text-xl"><span class="material-symbols-outlined font-extralight text-3xl text-right cursor-pointer">picture_as_pdf</span></th>
                            <th class="font-thin text-xl text-left"><a href="{{ asset($archivo->url) }}">{{$archivo->nombre}}</a></th>
                            <th>
                            <div class="grid grid-cols-3">
                                <span class="material-symbols-outlined font-extralight text-3xl text-right cursor-pointer"><a href="{{ asset($archivo->url) }}"> visibility</a></span>
                                <span class="material-symbols-outlined font-extralight text-3xl cursor-pointer">delete</span>
                                
                            </div>
                            </th>
                        </tr>        

                    @endif
                
                @else
                  
                    <!---para folders--->
                    @if (Auth::user()->carrera_id!= NULL )
                        
                        @if ($archivo->carrera_id==Auth::user()->carrera_id)
                            <tr class="border-2 border-y-black border-x-white folder {{$id_folder}}" style="display:none;" id="{{$archivo->id}}">
                                <th class="font-thin text-xl"><span class="material-symbols-outlined font-extralight text-3xl text-right cursor-pointer "  onclick="mostrar({{$archivo->id}})">folder</span></th>
                                <th class="font-thin text-xl text-left">{{$archivo->nombre}}</th>
                                <th>
                                <div class="grid grid-cols-3">
                                    <span class="material-symbols-outlined font-extralight text-3xl text-right cursor-pointer" onclick="showModal({{$archivo->id}})">add</span>
                                    <span class="material-symbols-outlined font-extralight text-3xl cursor-pointer">delete</span>
                                    <span class="material-symbols-outlined font-extralight text-3xl text-left cursor-pointer">edit_square</span>
                                </div>
                                </th>
                            </tr>
                            
                            @includeWhen($archivo->archivos->isNotEmpty(), 'agregarRecursivo', ['archivos' => $archivo->archivos,'id_folder'=>$archivo->id])
                            
                        @endif
                    
                    
                    @else
                
                        <tr class="border-2 border-y-black border-x-white folder {{$id_folder}}" style="display:none;" id="{{$archivo->id}}">
                            <th class="font-thin text-xl"><span class="material-symbols-outlined font-extralight text-3xl text-right cursor-pointer"   onclick="mostrar({{$archivo->id}})">folder</span></th>
                            <th class="font-thin text-xl text-left">{{$archivo->nombre}}</th>
                            <th>
                            <div class="grid grid-cols-3">
                                <span class="material-symbols-outlined font-extralight text-3xl text-right cursor-pointer" onclick="showModal({{$archivo->id}})">add</span>
                                <span class="material-symbols-outlined font-extralight text-3xl cursor-pointer">delete</span>
                                <span class="material-symbols-outlined font-extralight text-3xl text-left cursor-pointer">edit_square</span>
                            </div>
                            </th>
                        </tr>    
                       
                        
                        @includeWhen($archivo->archivos->isNotEmpty(), 'agregarRecursivo', ['archivos' => $archivo->archivos,'id_folder'=>$archivo->id])
                        
                        
                    @endif
                    

                @endif
                    
                @endforeach