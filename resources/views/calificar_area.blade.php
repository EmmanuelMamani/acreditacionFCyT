@extends("header")
@section("main")
    <div class="flex justify-center">
       <div class="w-4/6 mt-10">
            <h3 class="p-2 ">Area #1 Normas juridicas e institucionales</h3>
       </div>
    </div>
    <div class="flex justify-center">
        <table class="w-4/6 mt-5 border-collapse table-auto">
            <thead class="border-4 border-b-black  border-x-white border-t-white">
                <tr>
                    <th>#</th>
                    <th>Descripcion indicador</th>
                    <th>Tipo de indicador</th>
                    <th>Ponderacion</th>
                    <th>Valor</th>
                    <th>Ponderacion x valor</th>
                    <th>Conclusion</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-2 border-y-black border-x-white">
                    <th class="font-thin text-xl">1.2</th>
                    <th class="font-thin text-xl">Normas juridicas e institucionales</th>
                    <th class="font-thin text-xl">RMA</th>
                    <th class="font-thin text-xl">2</th>
                    <th class="font-thin text-xl">
                        <div class="flex">
                            <input type="radio" name="valor" id=""> <label for="">1</label>
                            <input type="radio" name="valor" id=""><label for="">2</label>
                            <input type="radio" name="valor" id=""><label for="">3</label>
                            <input type="radio" name="valor" id=""><label for="">4</label>
                            <input type="radio" name="valor" id=""><label for="">5</label>
                        </div>
                    </th>
                    <th class="font-thin text-xl">10</th>
                    <th>
                            <button class="bg-sky-950 text-white py-2 px-3 rounded-3xl">Conclusiones</button>
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
@endsection<span