<?php

namespace App\Providers;

use App\Models\Adress;
use App\Models\Arxiv;
use App\Models\Deletkarzina;
use App\Models\Drektor;
use App\Models\Ichkitavar;
use App\Models\Tavar;
use App\Models\Umumiy;
use App\Models\Updatetavr;
use App\Models\User;
use App\Providers\KlentServis2;
use App\Models\Itogo;
use App\Models\Karzina;
use App\Models\Karzina2;
use App\Models\Karzina3;
use App\Models\Tavar2;
use App\Models\Zakaz;
use App\Models\Zakaz2;
use Illuminate\Support\Facades\Session;
class KlentServis extends KlentServis2
{
    public function store($request)
    {
        if($request->id){
            return $this->update($request);        
        }else{
            $data = User::create($request->all());
            if($data){
                return response()->json(['code'=>200, 'msg'=>'Мувофакиятли яратилмади','data' => $data], 200);
            }
        }
    }

    public function update($request)
    {
        User::find($request->id)->update($request->all());
        $data = User::find($request->id);
        return response()->json(['code'=>201, 'msg'=>'Мувофакиятли янгиланди','data' => $data], 201);
    }

    public function delete($id)
    {
        User::find($id)->delete($id);
        return response()->json(['msg'=>'Мувофакиятли очирилди']);
    }


    // 2
    public function store2($request)
    {
        foreach ($request->addmore as $value) {
            $data = Tavar::create($value);
        }
        if($data){
            return response()->json(['code'=>200, 'msg'=>'Мувофакиятли яратилмади','data' => $data], 200);
        }
    }

    public function store2tip($request)
    {
        foreach ($request->addmore as $value) {
            $data = Tavar2::create($value);
        }
        if($data){
            return response()->json(['code'=>200, 'msg'=>'Мувофакиятли яратилмади','data' => $data], 200);
        }
    }

    public function update2($request)
    {
        Tavar::find($request->id)->update($request->all());
        $data = Tavar::find($request->id);
        return response()->json(['code'=>200, 'msg'=>'Мувофакиятли янгиланди','data' => $data], 200);
    }

    public function edit3()
    {
        $ichkitavar = Ichkitavar::all();
        $data = Tavar::all();
        $datatip = Tavar2::all();
        $adress = Adress::all();
        $tiklash = Deletkarzina::all();
        $umumiy = Umumiy::find(1);
        if(Session::has('IDIE')){
          $brends = Drektor::where('id','=',Session::get('IDIE'))->first();
          return view('tavar2',[
              'brends'=>$brends,
              'ichkitavar'=>$ichkitavar,
              'data'=>$data,
              'datatip'=>$datatip,
              'tiklash'=>$tiklash,
              'adress'=>$adress,
              'umumiy'=>$umumiy??[]
          ]);
        }else{
            return redirect('/logaut');
        }
    }

    public function store3($request)
    {
        foreach ($request->addmore as $value) {
            $foo = Ichkitavar::where('tavar_id', $value["tavar_id"])
                            ->where('adress', $value["adress"])
                            ->where('tavar2_id', $value["tavar2_id"])
                            ->first();
            if($foo){
                $a = $foo->hajm + $value["hajm"];
                $b = $value["summa"] - $foo->summa;
                $c = $foo->summa + $b / 2;
                $fff = Tavar2::find($value["tavar2_id"]);
                Ichkitavar::where('tavar_id', $value["tavar_id"])
                        ->where('adress', $value["adress"])
                        ->where('tavar2_id', $value["tavar2_id"])
                        ->update([
                            'name'=>$fff->name,
                            'raqam' => $value["raqam"],
                            'hajm' => $a, 
                            'summa' => $c,
                            'summa2' => $value["summa2"],
                            'summa3' => $value["summa3"],
                        ]);
                $data = Ichkitavar::where('tavar_id', $value["tavar_id"])
                        ->where('adress', $value["adress"])
                        ->where('tavar2_id', $value["tavar2_id"])
                        ->first();
                Updatetavr::create([
                        'tavar_id'=>$value["tavar_id"],
                        'ichkitavar_id'=>$data->id,
                        'adress'=>$value["adress"],
                        'tavar2_id'=>$value["tavar2_id"],
                        'raqam'=>$value["raqam"],
                        'hajm'=>$value["hajm"],
                        'summa'=>$value["summa"],
                        'summa2'=>$value["summa2"],
                        'summa3'=>$value["summa3"],
                    ]);
            }else{
                $fff = Tavar2::find($value["tavar2_id"]);
                $data = Ichkitavar::create([
                    'tavar_id'=>$value["tavar_id"],
                    'adress'=>$value["adress"],
                    'tavar2_id'=>$value["tavar2_id"],
                    'name'=>$fff["name"],
                    'raqam'=>$value["raqam"],
                    'hajm'=>$value["hajm"],
                    'summa'=>$value["summa"],
                    'summa2'=>$value["summa2"],
                    'summa3'=>$value["summa3"],
                ]);
                Updatetavr::create([
                    'tavar_id'=>$value["tavar_id"],
                    'ichkitavar_id'=>$data->id,
                    'adress'=>$value["adress"],
                    'tavar2_id'=>$value["tavar2_id"],
                    'raqam'=>$value["raqam"],
                    'hajm'=>$value["hajm"],
                    'summa'=>$value["summa"],
                    'summa2'=>$value["summa2"],
                    'summa3'=>$value["summa3"],
                ]);
            }
        }
        return response()->json(['code'=>200, 'msg'=>'Мувофакиятли яратилмади','data' => $data], 200);
    }

    public function updates($request)
    {
        $updatetavr = Updatetavr::where('ichkitavar_id', $request->id)->first();
        $foo = Ichkitavar::find($request->id);
        $fff = Tavar2::find($foo->tavar2_id);
        $h1 = $foo->hajm - $updatetavr->hajm + $request->hajm;
        $sum2 = $foo->summa2 - $updatetavr->summa2 + $request->summa2;
        $sum3 = $foo->summa3 - $updatetavr->summa3 + $request->summa3;        
        $data = Ichkitavar::find($request->id)->update([
            'tavar_id'=>$request->tavar_id,
            'adress'=>$request->adress,
            'tavar2_id'=>$request->tavar2_id,
            'name'=>$fff->name,
            'raqam'=>$request->raqam,
            'hajm'=>$h1,
            'summa'=>$request->summa,
            'summa2'=>$sum2,
            'summa3'=>$sum3,
        ]);
        Updatetavr::where('ichkitavar_id', $request->id)->update([
            'tavar_id'=>$request->tavar_id,
            'ichkitavar_id'=>$request->id, 
            'adress'=>$request->adress,
            'tavar2_id'=>$request->tavar2_id,
            'raqam'=>$request->raqam,
            'hajm'=>$request->hajm, 
            'summa'=>$request->summa,
            'summa2'=>$request->summa2,
            'summa3'=>$request->summa3,
        ]);
        return response()->json(['code'=>201, 'msg'=>'Мувофакиятли янгиланди','data' => $data], 201);
    }

    public function delete3($id)
    {
        $data = Ichkitavar::find($id);
        $fff = Tavar2::find($data->tavar2_id);
        Deletkarzina::create([
            'tavar_id'=>$data->tavar_id,
            'adress'=>$data->adress,
            'tavar2_id'=>$data->tavar2_id,
            'name'=>$fff->name,
            'raqam'=>$data->raqam,
            'hajm'=>$data->hajm, 
            'summa'=>$data->summa,
            'summa2'=>$data->summa2,
            'summa3'=>$data->summa3,
            'kurs'=>$data->kurs, 
            'kurs2'=>$data->kurs2
        ]);
        Ichkitavar::find($id)->delete($id);
        return response()->json(['msg'=>'Мувофакиятли очирилди']);
    }

    public function tiklash($id)
    {
        $data = Deletkarzina::find($id);
        $a = Ichkitavar::create([
            'tavar_id'=>$data->tavar_id,
            'adress'=>$data->adress,
            'tavar2_id'=>$data->tavar2_id,
            'name'=>$data->name,
            'raqam'=>$data->raqam,
            'hajm'=>$data->hajm, 
            'summa'=>$data->summa,
            'summa2'=>$data->summa2,
            'summa3'=>$data->summa3,
            'kurs'=>$data->kurs, 
            'kurs2'=>$data->kurs2
        ]);
        Updatetavr::create([
            'tavar_id'=>$data->tavar_id,
            'ichkitavar_id'=>$a->id,
            'adress'=>$data->adress,
            'tavar2_id'=>$data->tavar2_id,
            'raqam'=>$data->raqam,
            'hajm'=>$data->hajm, 
            'summa'=>$data->summa,
            'summa2'=>$data->summa2,
            'summa3'=>$data->summa3
        ]);
        Deletkarzina::find($id)->delete($id);
        return response()->json(['msg'=>'Мувофакиятли тикланди']);
    }

    public function deleetemnu($id)
    {
        Deletkarzina::find($id)->delete($id);
        return response()->json(['msg'=>'Мувофакиятли очирилди']);
    }

    public function store4($request)
    {
        $foo = Ichkitavar::find($request->id);
        $h1 = $foo->hajm + $request->hajm;
        $sum1 = $foo->summa + $request->summa;
        $sum2 = $foo->summa2 + $request->summa2;       
        Ichkitavar::find($request->id)->update([
            'raqam'=>$request->raqam,
            'hajm'=>$h1,
            'summa'=>$sum1,
            'summa2'=>$sum2
        ]);
        $data = Ichkitavar::find($request->id);
        return response()->json(['code'=>201, 'msg'=>'Мувофакиятли янгиланди','data' => $data], 201);
       
    }

    public function pastavka($request)
    {
        foreach ($request->addmore as $value) {
            $data = Adress::create($value);
        }
        if($data){
            return response()->json(['code'=>200, 'msg'=>'Мувофакиятли яратилмади','data' => $data], 200);
        }
    }

    public function pastavkaupdate($request)
    {
        Adress::find($request->id)->update($request->all());
        $data = Adress::find($request->id);
        return response()->json(['code'=>201, 'msg'=>'Мувофакиятли янгиланди','data' => $data], 201);
    }

    public function deletew4($id)
    {
        Adress::find($id)->delete($id);
        return response()->json(['msg'=>'Мувофакиятли очирилди']);
    }

    public function clents()
    {
        $user = User::paginate(10);
        if(Session::has('IDIE')){
            $brends = Drektor::where('id','=',Session::get('IDIE'))->first();
            return view('clent',[
                'brends'=>$brends,
                'collection'=>$user,
            ]);
        }else{
            return redirect('/logaut');
        }
    }

    public function sazdat($request)
    {
        $valyuta = Itogo::find(1);
        if($request->radio == "option1"){
            if($valyuta->usd == 0){
                $foo = Ichkitavar::find($request->id);
                $dat = Karzina::create([
                    'tavar_id' => $foo->tavar_id,
                    'ichkitavar_id' => $foo->id,
                    'name' => $foo->name,
                    'raqam' => $foo->raqam,
                    'soni' => 1,
                    'hajm' => $foo->hajm,
                    'summa' => $foo->summa3,
                    'summa2' => $foo->kurs2,
                    'chegirma' => 0,
                    'itog' => $foo->kurs2,
                ]);
                $ito = Itogo::find(1);
                if($ito){
                    $j = $ito->itogo + $foo->kurs2;
                    Itogo::find(1)->update([
                        'itogo'=>$j,
                    ]);
                    $ito2 = Itogo::find(1);
                    return response()->json(['msg'=>'Кошилди', 'data'=>$dat, 'data2'=>$ito2]);
        
                }else{
                    Itogo::create([
                        'itogo'=>$foo->kurs2,
                    ]);
                    $ito3 = Itogo::find(1);
                    return response()->json(['msg'=>'Кошилди', 'data'=>$dat, 'data2'=>$ito3]);
                }
            }else{
                $foo = Ichkitavar::find($request->id);
                $dat = Karzina::create([
                    'tavar_id' => $foo->tavar_id,
                    'ichkitavar_id' => $foo->id,
                    'name' => $foo->name,
                    'raqam' => $foo->raqam,
                    'soni' => 1,
                    'hajm' => $foo->hajm,
                    'summa' => $foo->summa3 / $valyuta->kurs,
                    'summa2' => $foo->kurs2 / $valyuta->kurs,
                    'chegirma' => 0,
                    'itog' => $foo->kurs2 / $valyuta->kurs,
                ]);
                $ito = Itogo::find(1);
                if($ito){
                    $j = $ito->itogo + $foo->kurs2 / $valyuta->kurs;
                    Itogo::find(1)->update([
                        'itogo'=>$j,
                    ]);
                    $ito2 = Itogo::find(1);
                    return response()->json(['msg'=>'Кошилди', 'data'=>$dat, 'data2'=>$ito2]);
        
                }else{
                    Itogo::create([
                        'itogo'=>$foo->kurs2 / $valyuta->kurs,
                    ]);
                    $ito3 = Itogo::find(1);
                    return response()->json(['msg'=>'Кошилди', 'data'=>$dat, 'data2'=>$ito3]);
                }
            }
        }else{
            if($valyuta->usd == 0){
                $foo = Ichkitavar::find($request->id);
                $dat = Karzina::create([
                    'tavar_id' => $foo->tavar_id,
                    'ichkitavar_id' => $foo->id,
                    'name' => $foo->name,
                    'raqam' => $foo->raqam,
                    'soni' => 1,
                    'hajm' => $foo->hajm,
                    'summa' => $foo->summa2,
                    'summa2' => $foo->kurs,
                    'chegirma' => 0,
                    'itog' => $foo->kurs,
                ]);
                $ito = Itogo::find(1);
                if($ito){
                    $j = $ito->itogo + $foo->kurs;
                    Itogo::find(1)->update([
                        'itogo'=>$j,
                    ]);
                    $ito2 = Itogo::find(1);
                    return response()->json(['msg'=>'Кошилди', 'data'=>$dat, 'data2'=>$ito2]);
        
                }else{
                    Itogo::create([
                        'itogo'=>$foo->kurs,
                    ]);
                    $ito3 = Itogo::find(1);
                    return response()->json(['msg'=>'Кошилди', 'data'=>$dat, 'data2'=>$ito3]);
                }
            }else{
                $foo = Ichkitavar::find($request->id);
                $dat = Karzina::create([
                    'tavar_id' => $foo->tavar_id,
                    'ichkitavar_id' => $foo->id,
                    'name' => $foo->name,
                    'raqam' => $foo->raqam,
                    'soni' => 1,
                    'hajm' => $foo->hajm,
                    'summa' => $foo->summa2 / $valyuta->kurs,
                    'summa2' => $foo->kurs / $valyuta->kurs,
                    'chegirma' => 0,
                    'itog' => $foo->kurs / $valyuta->kurs,
                ]);
                $ito = Itogo::find(1);
                if($ito){
                    $j = $ito->itogo + $foo->kurs / $valyuta->kurs;
                    Itogo::find(1)->update([
                        'itogo'=>$j,
                    ]);
                    $ito2 = Itogo::find(1);
                    return response()->json(['msg'=>'Кошилди', 'data'=>$dat, 'data2'=>$ito2]);
        
                }else{
                    Itogo::create([
                        'itogo'=>$foo->kurs / $valyuta->kurs,
                    ]);
                    $ito3 = Itogo::find(1);
                    return response()->json(['msg'=>'Кошилди', 'data'=>$dat, 'data2'=>$ito3]);
                }
            }
        }
    }

    public function usdkurd2($request)
    {
        $row = Ichkitavar::all();
        foreach ($row as $value) {
            $dat = $value->summa2 * $request->kurs;
            $dat2 = $value->summa3 * $request->kurs;
            Ichkitavar::find($value->id)->update([
                'kurs'=>$dat,
                'kurs2'=>$dat2
            ]);
        }
        $a = Itogo::find(1);
        if($a){
            Itogo::find(1)->update([
                'kurs'=>$request->kurs
            ]);
        }else{
            Itogo::create([
                'itogo'=>0,
                'kurs'=>$request->kurs,
                'usd'=>0
            ]);
        }
        $b2 = Itogo::find(1);
        return response()->json(['msg'=>'Киритилди', 'data'=>$b2]);
    }

    public function plus($request)
    {
        $foo1 = Karzina::find($request->id);
        $row = Ichkitavar::find($foo1->ichkitavar_id);
        $valyuta = Itogo::find(1);
        $a = $foo1->soni + 1;
        if($a > $row->hajm){
            return response()->json(['msg'=>'Тавар етарли емас', 'error'=>400]);
        }else{
            if($valyuta->usd == 0){
                if($request->radio == "option2"){
                    $itog = $foo1->itog + $row->kurs;
                    $itog2 = $foo1->summa + $row->summa2;
                    Karzina::find($request->id)->update([
                        'soni'=>$a,
                        'itog'=>$itog,
                        'summa'=>$itog2,
                    ]);
                    $foo3 = Karzina::find($request->id);
                    $b = Itogo::find(1);
                    $j = $b->itogo + $row->kurs;
                    Itogo::find(1)->update([
                        'itogo'=>$j,
                    ]);
                    $b2 = Itogo::find(1);
                    return response()->json(['data'=>$foo3, 'data2'=>$b2]);
                }else{
                    $itog = $foo1->itog + $row->kurs2;
                    $itog2 = $foo1->summa + $row->summa3;
                    Karzina::find($request->id)->update([
                        'soni'=>$a,
                        'itog'=>$itog,
                        'summa'=>$itog2,
                    ]);
                    $foo3 = Karzina::find($request->id);
                    $b = Itogo::find(1);
                    $j = $b->itogo + $row->kurs2;
                    Itogo::find(1)->update([
                        'itogo'=>$j,
                    ]);
                    $b2 = Itogo::find(1);
                    return response()->json(['data'=>$foo3, 'data2'=>$b2]);
                }
            }else{
                if($request->radio == "option2"){
                    $itog = $foo1->itog + $row->kurs / $valyuta->kurs;
                    $itog2 = $foo1->summa + $row->summa2 / $valyuta->kurs;
                    Karzina::find($request->id)->update([
                        'soni'=>$a,
                        'itog'=>$itog,
                        'summa'=>$itog2,
                    ]);
                    $foo3 = Karzina::find($request->id);
                    $b = Itogo::find(1);
                    $j = $b->itogo + $row->kurs / $valyuta->kurs;
                    Itogo::find(1)->update([
                        'itogo'=>$j,
                    ]);
                    $b2 = Itogo::find(1);
                    return response()->json(['data'=>$foo3, 'data2'=>$b2]);
                }else{
                    $itog = $foo1->itog + $row->kurs2 / $valyuta->kurs;
                    $itog2 = $foo1->summa + $row->summa3 / $valyuta->kurs;
                    Karzina::find($request->id)->update([
                        'soni'=>$a,
                        'itog'=>$itog,
                        'summa'=>$itog2,
                    ]);
                    $foo3 = Karzina::find($request->id);
                    $b = Itogo::find(1);
                    $j = $b->itogo + $row->kurs2 / $valyuta->kurs;
                    Itogo::find(1)->update([
                        'itogo'=>$j,
                    ]);
                    $b2 = Itogo::find(1);
                    return response()->json(['data'=>$foo3, 'data2'=>$b2]);
                }
            }
        }
    }

    public function minus($request)
    {
        $foo1 = Karzina::find($request->id);
        $row = Ichkitavar::find($foo1->ichkitavar_id);
        $valyuta = Itogo::find(1);
        $a = $foo1->soni - 1;
        if($a < 1){
            return $this->delminus($request, $row, $valyuta);
        }else{
            if($valyuta->usd == 0){
                if($request->radio == "option2"){
                    $itog = $foo1->itog - $row->kurs;
                    $itog2 = $foo1->summa - $row->summa2;
                    Karzina::find($request->id)->update([
                        'soni'=>$a,
                        'itog'=>$itog,
                        'summa'=>$itog2,
                    ]);
                    $foo3 = Karzina::find($request->id);
                    $b = Itogo::find(1);
                    $j = $b->itogo - $row->kurs;
                    Itogo::find(1)->update([
                        'itogo'=>$j,
                    ]);
                    $b2 = Itogo::find(1);
                    return response()->json(['data'=>$foo3, 'data2'=>$b2]);
                }else{
                    $itog = $foo1->itog - $row->kurs2;
                    $itog2 = $foo1->summa - $row->summa3;
                    Karzina::find($request->id)->update([
                        'soni'=>$a,
                        'itog'=>$itog,
                        'summa'=>$itog2,
                    ]);
                    $foo3 = Karzina::find($request->id);
                    $b = Itogo::find(1);
                    $j = $b->itogo - $row->kurs2;
                    Itogo::find(1)->update([
                        'itogo'=>$j,
                    ]);
                    $b2 = Itogo::find(1);
                    return response()->json(['data'=>$foo3, 'data2'=>$b2]);
                }
            }else{
                if($request->radio == "option2"){
                    $itog = $foo1->itog - $row->kurs / $valyuta->kurs;
                    $itog2 = $foo1->summa - $row->summa2 / $valyuta->kurs;
                    Karzina::find($request->id)->update([
                        'soni'=>$a,
                        'itog'=>$itog,
                        'summa'=>$itog2,
                    ]);
                    $foo3 = Karzina::find($request->id);
                    $b = Itogo::find(1);
                    $j = $b->itogo - $row->kurs / $valyuta->kurs;
                    Itogo::find(1)->update([
                        'itogo'=>$j,
                    ]);
                    $b2 = Itogo::find(1);
                    return response()->json(['data'=>$foo3, 'data2'=>$b2]);
                }else{
                    $itog = $foo1->itog - $row->kurs2 / $valyuta->kurs;
                    $itog2 = $foo1->summa - $row->summa3 / $valyuta->kurs;
                    Karzina::find($request->id)->update([
                        'soni'=>$a,
                        'itog'=>$itog,
                        'summa'=>$itog2,
                    ]);
                    $foo3 = Karzina::find($request->id);
                    $b = Itogo::find(1);
                    $j = $b->itogo - $row->kurs2 / $valyuta->kurs;
                    Itogo::find(1)->update([
                        'itogo'=>$j,
                    ]);
                    $b2 = Itogo::find(1);
                    return response()->json(['data'=>$foo3, 'data2'=>$b2]);
                }
            }
        }
    }

    public function delminus($request, $row, $valyuta)
    {
        $b = Itogo::find(1);
        $j = $b->itogo - $row->kurs / $valyuta->kurs;
        Itogo::find(1)->update([
            'itogo'=>$j
        ]);
        $b2 = Itogo::find(1);
        $foo3 = Karzina::find($request->id);
        Karzina::find($request->id)->delete($request->id);
        $iff = Karzina::count();
        if ($iff == 0) {
            Itogo::find(1)->update([
                'itogo'=>0,
            ]);
            $b3 = Itogo::find(1);
            return response()->json(['msg'=>'Тавар олиб ташланди', 'data'=>$foo3, 'data2'=>$b3, 'error'=>400]);
        }else{
            return response()->json(['msg'=>'Тавар олиб ташланди', 'data'=>$foo3, 'data2'=>$b2, 'error'=>400]);
        }
    }

    public function udalit($request)
    {
        $foo1 = Karzina::find($request->id);
        $b = Itogo::find(1);
        $j = $b->itogo - $foo1->itog;
        Itogo::find(1)->update([
            'itogo'=>$j,
        ]);
        $b2 = Itogo::find(1);
        Karzina::find($request->id)->delete($request->id);
        $iff = Karzina::count();
        if ($iff == 0) {
            Itogo::find(1)->update([
                'itogo'=>0,
            ]);
            $b3 = Itogo::find(1);
            return response()->json(['msg'=>'Очирилди', 'data'=>$foo1, 'data2'=>$b3]);
        }else{
            return response()->json(['msg'=>'Очирилди', 'data'=>$foo1, 'data2'=>$b2]);
        }
    }

    public function yangilash($request)
    {
        $foo1 = Karzina::find($request->id);
        $row = Ichkitavar::find($foo1->ichkitavar_id);
        if($request->soni > $row->hajm){
            return response()->json(['msg'=>'Тавар етарли емас', 'code'=>0]);
        }else{
            $b = Itogo::find(1);
            $pool = $b->itogo - $foo1->itog;
            $poo2 = $pool + $request->summ;
            Itogo::find(1)->update([
                'itogo'=>$poo2
            ]);
            Karzina::find($request->id)->update([
                'soni'=>$request->soni,
                'summa2'=>$request->summo,
                'chegirma'=>$request->cheg,
                'itog'=>$request->summ,
            ]);
            $foo3 = Karzina::find($request->id);
            $b2 = Itogo::find(1);
            return response()->json(['msg'=>'Янгиланди', 'data'=>$foo3, 'data2'=>$b2]);
        }
    }

    public function tugle($request)
    {
        unset($request["_tokin"]);
        $row = Karzina::all();
        $b23 = Itogo::find(1);
        if($b23->usd == 0){
            foreach ($row as $value) {
                $dat = $value->summa2 / $b23->kurs;
                $dat2 = $value->itog / $b23->kurs;
                Karzina::find($value->id)->update([
                    'summa2'=>$dat,
                    'itog'=>$dat2
                ]);
            }
            Itogo::find(1)->update([
                'itogo' => $b23->itogo / $b23->kurs,
                'usd' => 1,
            ]);
            $b2 = Itogo::find(1);
            return response()->json(['msg'=>'Киритилди', 'data'=>$b2]);
        }else{
            return $this->tuglesom($b23);
        }
    }

    public function tuglesom($b23)
    {
        $row = Karzina::all();
        foreach ($row as $value) {
            $dat = $value->summa2 * $b23->kurs;
            $dat2 = $value->itog * $b23->kurs;
            Karzina::find($value->id)->update([
                'summa2'=>$dat,
                'itog'=>$dat2
            ]);
        }
        Itogo::find(1)->update([
            'itogo' => $b23->itogo * $b23->kurs,
            'usd' => 0
        ]);
        $b2 = Itogo::find(1);
        return response()->json(['msg'=>'Киритилди', 'data'=>$b2]);        
    }

    public function oplata($request)
    {
        $usd = Itogo::find(1);
        if ($usd->usd == 1) {
            if($request->id){
                $variable = Karzina::all();
                $arxiv = Arxiv::create([
                    'user_id'=>$request->id,
                    'itogs'=>$request->itogs,
                    'naqt'=>$request->naqt,
                    'plastik'=>$request->plastik,
                    'bank'=>$request->bank,
                    'karzs'=>$request->karzs,
                ]);
                foreach ($variable as $value) {
                    Karzina2::create([
                        'user_id'=> $request->id,
                        'tavar_id'=> $value->tavar_id,
                        'ichkitavar_id'=> $value->ichkitavar_id,
                        'clentra' => $arxiv->clentra,
                        'name'=> $value->name, 
                        'soni'=> $value->soni,  
                        'hajm'=> $value->hajm, 
                        'summa'=> $value->summa, 
                        'summa2'=> $value->summa2, 
                        'chegirma'=> $value->chegirma, 
                        'itog'=> $value->itog,
                    ]);
                    $foo = Ichkitavar::find($value->ichkitavar_id);
                    $foo2 = $foo->hajm - $value->soni;
                    Ichkitavar::find($value->ichkitavar_id)->update([
                        'hajm'=>$foo2
                    ]);
                }
                Itogo::find(1)->update([
                    'itogo'=>0,
                ]);
                $b2 = Itogo::find(1);
                Karzina::where('id',">",0)->delete();
                return response()->json(['data'=>$b2]);
            }else{
                $variable = Karzina::all();
                foreach ($variable as $value) {
                    Karzina3::create([
                        'tavar_id'=> $value->tavar_id,
                        'ichkitavar_id'=> $value->ichkitavar_id,
                        'name'=> $value->name, 
                        'soni'=> $value->soni,  
                        'hajm'=> $value->hajm, 
                        'summa'=> $value->summa, 
                        'summa2'=> $value->summa2, 
                        'chegirma'=> $value->chegirma, 
                        'itog'=> $value->itog,
                    ]);
                    $foo = Ichkitavar::find($value->ichkitavar_id);
                    $foo2 = $foo->hajm - $value->soni;
                    Ichkitavar::find($value->ichkitavar_id)->update([
                        'hajm'=>$foo2
                    ]);
                }
                Itogo::find(1)->update([
                    'itogo'=>0,
                ]);
                $b2 = Itogo::find(1);
                Karzina::where('id',">",0)->delete();
                return response()->json(['data'=>$b2]);
            }
        }else{
            if($request->id){
                $variable = Karzina::all();
                $arxiv = Arxiv::create([
                    'user_id'=>$request->id,
                    'itogs'=>$request->itogs / $usd->kurs,
                    'naqt'=>$request->naqt / $usd->kurs,
                    'plastik'=>$request->plastik / $usd->kurs,
                    'bank'=>$request->bank / $usd->kurs,
                    'karzs'=>$request->karzs / $usd->kurs,
                ]);
                foreach ($variable as $value) {
                    Karzina2::create([
                        'user_id'=> $request->id,
                        'tavar_id'=> $value->tavar_id,
                        'ichkitavar_id'=> $value->ichkitavar_id,
                        'clentra' => $arxiv->clentra,
                        'name'=> $value->name, 
                        'soni'=> $value->soni,  
                        'hajm'=> $value->hajm, 
                        'summa'=> $value->summa / $usd->kurs, 
                        'summa2'=> $value->summa2 / $usd->kurs, 
                        'chegirma'=> $value->chegirma, 
                        'itog'=> $value->itog / $usd->kurs,
                    ]);
                    $foo = Ichkitavar::find($value->ichkitavar_id);
                    $foo2 = $foo->hajm - $value->soni;
                    Ichkitavar::find($value->ichkitavar_id)->update([
                        'hajm'=>$foo2
                    ]);
                }
                Itogo::find(1)->update([
                    'itogo'=>0,
                ]);
                $b2 = Itogo::find(1);
                Karzina::where('id',">",0)->delete();
                return response()->json(['data'=>$b2]);
            }else{
                $variable = Karzina::all();
                foreach ($variable as $value) {
                    Karzina3::create([
                        'tavar_id'=> $value->tavar_id,
                        'ichkitavar_id'=> $value->ichkitavar_id,
                        'name'=> $value->name,
                        'soni'=> $value->soni,
                        'hajm'=> $value->hajm,
                        'summa'=> $value->summa / $usd->kurs,
                        'summa2'=> $value->summa2 / $usd->kurs,
                        'chegirma'=> $value->chegirma,
                        'itog'=> $value->itog / $usd->kurs,
                    ]);
                    $foo = Ichkitavar::find($value->ichkitavar_id);
                    $foo2 = $foo->hajm - $value->soni;
                    Ichkitavar::find($value->ichkitavar_id)->update([
                        'hajm'=>$foo2
                    ]);
                }
                Itogo::find(1)->update([
                    'itogo'=>0,
                ]);
                $b2 = Itogo::find(1);
                Karzina::where('id',">",0)->delete();
                return response()->json(['data'=>$b2]);
            }
        }
    }

    public function zakazayt($request)
    {
        $usd = Itogo::find(1);
        if ($usd->usd == 1) {
            if($request->id){
                $variable = Karzina::all();
                Arxiv::create([
                    'user_id'=>$request->id,
                    'itogs'=>$request->itogs,
                    'naqt'=>$request->naqt,
                    'plastik'=>$request->plastik,
                    'bank'=>$request->bank,
                    'karzs'=>$request->karzs,
                ]);
                foreach ($variable as $value) {
                    Karzina2::create([
                        'user_id'=> $request->id,
                        'tavar_id'=> $value->tavar_id,
                        'ichkitavar_id'=> $value->ichkitavar_id,
                        'name'=> $value->name, 
                        'soni'=> $value->soni,  
                        'hajm'=> $value->hajm, 
                        'summa'=> $value->summa, 
                        'summa2'=> $value->summa2, 
                        'chegirma'=> $value->chegirma,
                        'itog'=> $value->itog,
                        'zakaz'=> $request->checks,
                    ]);
                }
                Itogo::find(1)->update([
                    'itogo'=>0,
                ]);
                $b2 = Itogo::find(1);
                Karzina::where('id',">",0)->delete();
                return response()->json(['data'=>$b2]);
            }else{
                $variable = Karzina::all();
                $fooo = Zakaz::create([
                    'malumot'=>$request->malumot,
                    'itogs'=>$request->itogs,
                    'naqt'=>$request->naqt,
                    'plastik'=>$request->plastik,
                    'bank'=>$request->bank,
                    'karzs'=>$request->karzs,
                ]);
                foreach ($variable as $value) {
                    Zakaz2::create([
                        'zakaz_id'=> $fooo->id,
                        'tavar_id'=> $value->tavar_id,
                        'ichkitavar_id'=> $value->ichkitavar_id,
                        'name'=> $value->name, 
                        'soni'=> $value->soni,  
                        'hajm'=> $value->hajm, 
                        'summa'=> $value->summa, 
                        'summa2'=> $value->summa2, 
                        'chegirma'=> $value->chegirma, 
                        'itog'=> $value->itog,
                    ]);
                }
                Itogo::find(1)->update([
                    'itogo'=>0,
                ]);
                $b2 = Itogo::find(1);
                Karzina::where('id',">",0)->delete();
                return response()->json(['data'=>$b2]);
            }
        }else{
            if($request->id){
                $variable = Karzina::all();          
                $fooo = Arxiv::create([
                    'user_id'=>$request->id,
                    'itogs'=>$request->itogs / $usd->kurs,
                    'naqt'=>$request->naqt / $usd->kurs,
                    'plastik'=>$request->plastik / $usd->kurs,
                    'bank'=>$request->bank / $usd->kurs,
                    'karzs'=>$request->karzs / $usd->kurs,
                ]);
                foreach ($variable as $value) {
                    Karzina2::create([
                        'user_id'=> $request->id,
                        'tavar_id'=> $value->tavar_id,
                        'ichkitavar_id'=> $value->ichkitavar_id,
                        'name'=> $value->name,
                        'soni'=> $value->soni,  
                        'hajm'=> $value->hajm, 
                        'summa'=> $value->summa / $usd->kurs, 
                        'summa2'=> $value->summa2 / $usd->kurs, 
                        'chegirma'=> $value->chegirma,
                        'itog'=> $value->itog / $usd->kurs,
                        'zakaz'=> $request->checks,
                    ]);
                }
                Itogo::find(1)->update([
                    'itogo'=>0,
                ]);
                $b2 = Itogo::find(1);
                Karzina::where('id',">",0)->delete();
                return response()->json(['data'=>$b2]);
            }else{
                $variable = Karzina::all();
                $fooo = Zakaz::create([
                    'malumot'=>$request->malumot,
                    'itogs'=>$request->itogs / $usd->kurs,
                    'naqt'=>$request->naqt / $usd->kurs,
                    'plastik'=>$request->plastik / $usd->kurs,
                    'bank'=>$request->bank / $usd->kurs,
                    'karzs'=>$request->karzs / $usd->kurs,
                ]);
                foreach ($variable as $value) {
                    Zakaz2::create([
                        'zakaz_id'=> $fooo->id,
                        'tavar_id'=> $value->tavar_id,
                        'ichkitavar_id'=> $value->ichkitavar_id,
                        'name'=> $value->name, 
                        'soni'=> $value->soni,  
                        'hajm'=> $value->hajm, 
                        'summa'=> $value->summa / $usd->kurs, 
                        'summa2'=> $value->summa2 / $usd->kurs, 
                        'chegirma'=> $value->chegirma, 
                        'itog'=> $value->itog / $usd->kurs,
                    ]);
                }
                Itogo::find(1)->update([
                    'itogo'=>0,
                ]);
                $b2 = Itogo::find(1);
                Karzina::where('id',">",0)->delete();
                return response()->json(['data'=>$b2]);
            }
        }        
    }
}