
@foreach ($archivos->sortBy('tipo') as $archivo)
               
                @if ($archivo->tipo=='archivo')

                    @if (Auth::user()->carrera_id!= NULL )
                        
                        @if ($archivo->carrera_id==Auth::user()->carrera_id || $archivo->carrera_id==null)
                            <tr class="border border-y-stone-300 border-x-white {{$id_folder}}" style="display:none;">
                                @php
                                         $caracteres_noaceptados=array("/","\\",":","*","?",'"',"<",">","|");
                                        
                                    @endphp
                                <th class="font-thin text-xl"><span class="material-symbols-outlined font-thin text-3xl text-right cursor-pointer">picture_as_pdf</span></th>
                                
                                @if ($archivo->carrera_id!=null)
                                <th class="font-thin text-lg text-left"><a href="{{ asset('/storage/files/'.str_replace(' ','_',$archivo->carrera->name).'/'.$archivo->nombre)  }}" target="_blank" >{{$archivo->nombre}}</a></th>
                                @else
                                <th class="font-thin text-lg text-left"><a href="{{ asset('/storage/files/'.str_replace(' ','_',$archivo->indicador->variable->area->name).'/'.str_replace(' ','_',$archivo->indicador->variable->name).'/'.str_replace($caracteres_noaceptados,'_',$archivo->indicador->descripcion).'/'.$archivo->nombre)  }}" target="_blank" >{{$archivo->nombre}}</a></th>
                                @endif

                                <th>
                                <div class="grid grid-cols-3">
                                    @if ($archivo->carrera_id!=null)
                                    <span class="material-symbols-outlined font-thin text-3xl text-right cursor-pointer" ><a href="{{ asset('/storage\/'.str_replace(' ','_',$archivo->carrera->name).'/'.$archivo->nombre) }}"> visibility</a></span>
                                    <form action="{{route("eliminar_archivo",['id'=>$archivo->id])}}" method="post" class="Eliminar">
                                        @csrf
                                        <button class="material-symbols-outlined  text-3xl cursor-pointer">delete</button>
                                    </form>
                                    @else
                                    <span class="material-symbols-outlined font-thin text-3xl text-right cursor-pointer" ><a href="{{ asset('/storage/files/'.str_replace(' ','_',$archivo->indicador->variable->area->name).'/'.str_replace(' ','_',$archivo->indicador->variable->name).'/'.str_replace($caracteres_noaceptados,'_',$archivo->indicador->descripcion).'/'.$archivo->nombre)}}"> visibility</a></span>
                                    @endif
                                    
                                    
                                    
                                </div>
                                </th>
                            </tr>
                        @endif
                    
                    
                    @else
                            @if ($archivo->carrera_id==null)
                                
                            
                        <tr class="border border-y-stone-300 border-x-white {{$id_folder}}" style="display:none;">
                            @php
                                         $caracteres_noaceptados=array("/","\\",":","*","?",'"',"<",">","|");
                                        
                                    @endphp
                            <th class="font-thin text-xl"><span class="material-symbols-outlined  text-3xl text-right cursor-pointer font-thin ">picture_as_pdf</span></th>
                            <th class="font-thin text-xl text-left"><a href="{{  asset('/storage/files/'.str_replace(' ','_',$archivo->indicador->variable->area->name).'/'.str_replace(' ','_',$archivo->indicador->variable->name).'/'.str_replace($caracteres_noaceptados,'_',$archivo->indicador->descripcion).$ruta.'/'.$archivo->nombre) }}">{{$archivo->nombre}}</a></th>
                            <th>
                            <div class="grid grid-cols-3">
                                <span class="material-symbols-outlined font-thin text-3xl text-right cursor-pointer"><a href="{{  asset('/storage/files/'.str_replace(' ','_',$archivo->indicador->variable->area->name).'/'.str_replace(' ','_',$archivo->indicador->variable->name).'/'.str_replace($caracteres_noaceptados,'_',$archivo->indicador->descripcion).$ruta.'/'.$archivo->nombre) }}"> visibility</a></span>
                                <form action="{{route("eliminar_archivo",['id'=>$archivo->id])}}" method="post" class="Eliminar">
                                    @csrf
                                    <button class="material-symbols-outlined  text-3xl cursor-pointer font-thin ">delete</button>
                                </form>
                                
                            </div>
                            </th>
                        </tr>   
                        @endif     

                    @endif
                
                @else
                  
                    <!---para folders--->
                    @if (Auth::user()->carrera_id!= NULL )
                        
                        @if ($archivo->carrera_id==Auth::user()->carrera_id || $archivo->carrera_id==null)
                            <tr class="border border-y-stone-300 border-x-white folder {{$id_folder}}" style="display:none;" id="{{$archivo->id}}">
                                <th class="font-thin text-xl"><span class="material-symbols-outlined  text-4xl text-right cursor-pointer "  onclick="mostrar({{$archivo->id}})">folder</span></th>
                                <th class="font-thin text-xl text-left">{{$archivo->nombre}}</th>
                                <th>
                                <div class="grid grid-cols-3">
                                    <span class="material-symbols-outlined  text-3xl text-right cursor-pointer" onclick="showModal({{$archivo->id}})">add</span>
                                    
                                    @if ($archivo->carrera_id!=null)
                                    <form action="{{route("eliminar_folder",['id'=>$archivo->id])}}" method="post" class="Eliminar">
                                        @csrf
                                        <button class="material-symbols-outlined  text-3xl cursor-pointer">delete</button>
                                    </form>
                                    @endif
                                    
                                    <span class="material-symbols-outlined  text-3xl text-left cursor-pointer" onclick="editar('{{$archivo->nombre}}','{{$archivo->id}}')">edit_square</span>
                                </div>
                                </th>
                            </tr>
                            
                            @includeWhen($archivo->archivos->isNotEmpty(), 'agregarRecursivo', ['archivos' => $archivo->archivos,'id_folder'=>$archivo->id,'ruta'=>$ruta.'/'.$archivo->nombre])
                            
                        @endif
                    
                    
                    @else
                        @if ( $archivo->carrera_id==null)
                            
                       
                        <tr class="border border-y-stone-300 border-x-white folder {{$id_folder}}" style="display:none;" id="{{$archivo->id}}">
                            <th class="font-thin text-xl"><span class="material-symbols-outlined  text-4xl text-right cursor-pointer"   onclick="mostrar({{$archivo->id}})">folder</span></th>
                            <th class="font-thin text-xl text-left">{{$archivo->nombre}}</th>
                            <th>
                            <div class="grid grid-cols-3">
                                <span class="material-symbols-outlined  text-3xl text-right cursor-pointer" onclick="showModal({{$archivo->id}})">add</span>
                                <form action="{{route("eliminar_folder",['id'=>$archivo->id])}}" method="post" class="Eliminar">
                                    @csrf
                                    <button class="material-symbols-outlined  text-3xl cursor-pointer">delete</button>
                                </form>
                                <span class="material-symbols-outlined  text-3xl text-left cursor-pointer" onclick="editar('{{$archivo->nombre}}','{{$archivo->id}}')">edit_square</span>
                            </div>
                            </th>
                        </tr>    
                       
                        
                        @includeWhen($archivo->archivos->isNotEmpty(), 'agregarRecursivo', ['archivos' => $archivo->archivos,'id_folder'=>$archivo->id,'ruta'=>$ruta.'/'.$archivo->nombre])
                        
                        @endif
                    @endif
                    

                @endif
                    
                @endforeach