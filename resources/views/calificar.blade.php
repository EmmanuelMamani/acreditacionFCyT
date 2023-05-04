@extends("header")
@section("main")
    <div class="flex justify-center">
       <div class="w-4/6 mt-10 grid grid-cols-10">
            <h3 class="p-2 ">Areas</h3>
       </div>
    </div>
    <div class="flex justify-center">
        <table class="w-4/6 mt-5 border-collapse table-auto">
            <thead class="border-4 border-b-black  border-x-white border-t-white">
                <tr>
                    <th>#</th>
                    <th>Descripcion</th>
                    <th>Promedio Area</th>
                    <th>Porcentaje Area</th>
                    <th>Ponderación</th>
                    <th>Porcentaje Area</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-2 border-y-black border-x-white">
                    <th class="font-thin text-xl">1</th>
                    <th class="font-thin text-xl">Normas juridicas e institucionales</th>
                    <th class="font-thin text-xl">3.88</th>
                    <th class="font-thin text-xl">77.42%</th>
                    <th class="font-thin text-xl">0.5</th>
                    <th class="font-thin text-xl">0.5</th>
                    <th>
                            <span class="material-symbols-outlined font-extralight text-3xl cursor-pointer">check_circle</span>
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
@endsection<span