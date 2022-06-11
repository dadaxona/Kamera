<?php

namespace App\Http\Controllers;

use App\Models\Tavar;
use App\Models\User;
use App\Providers\KlentServis;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use App\Models\Adress;
use App\Models\Arxiv;
use App\Models\Clentitog;
use App\Models\Data;
use App\Models\Drektor;
use App\Models\Ichkitavar;
use App\Models\Itogo;
use App\Models\Karzina;
use App\Models\Karzina2;
use App\Models\Karzina3;
use App\Models\Sqladpoytaxt;
use App\Models\Tavar2;
use App\Models\Tayyorsqlad;
use App\Models\Umumiy;
use App\Models\Updatetavr;
use App\Models\Zakaz;
use App\Models\Zakaz2;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class KlentController2 extends Controller
{
    public function tavar_tip(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data = DB::table('tavars')->where('name', 'like', '%'.$query.'%')->get();
        }
        else
        {
        $data = DB::table('tavars')->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr data-id="'.$row->id.'" id="data" style="cursor: pointer;" style="border-bottom: 1px solid;">
                    <td>'.$row->name.'</td>
                </tr>
                ';
            }
        }
        else
        {
        $output = '
            <tr>
                <td align="center" colspan="5">No Data Found</td>
            </tr>
            ';
        }
        $data = array(
            'table_data'  => $output,
            'total_data'  => $total_row
        );

        return response()->json($data);
        }
    }

    public function zzzz(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data = DB::table('zakazs')->where('malumot', 'like', '%'.$query.'%')->get();
        }
        else
        {
        $data = DB::table('zakazs')->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr data-id="'.$row->id.'" id="data2" style="cursor: pointer;" style="border-bottom: 1px solid;">
                    <td>'.$row->malumot.'</td>
                </tr>
                ';
            }
        }
        else
        {
        $output = '
            <tr>
                <td align="center" colspan="5">No Data Found</td>
            </tr>
            ';
        }
        return response()->json($output);
        }
    }
    
    public function zzzzcli(Request $request)
    {
        if($request->ajax())
        {
        $output='';
        $data = Zakaz2::where('zakaz_id', $request->id)->get();
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr style="border-bottom: 1px solid;">
                    <td>'.$row->zakaz->malumot.'</td>
                    <td>'.$row->name.'</td>
                    <td>'.$row->summa2.'</td>
                    <td>'.$row->soni.'</td>
                    <td>'.$row->chegirma.'</td>
                    <td>'.$row->itog.'</td>
                </tr>
                ';
            }
        }
        else
        {
        $output = '
            <tr>
                <td align="center" colspan="6">No Data Found</td>
            </tr>
            ';
        }
        return response()->json($output);
        }
    }

    public function zzzzaaaa(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data = DB::table('users')->where('name', 'like', '%'.$query.'%')->get();
        }
        else
        {
        $data = DB::table('users')->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr data-id="'.$row->id.'" id="data22" style="cursor: pointer;" style="border-bottom: 1px solid;">
                    <td>'.$row->name.'</td>
                </tr>
                ';
            }
        }
        else
        {
        $output = '
            <tr>
                <td align="center" colspan="5">No Data Found</td>
            </tr>
            ';
        }
        return response()->json($output);
        }
    }

    public function zzzzclick(Request $request)
    {
        if($request->ajax())
        {
        $output='';
        $da = User::find($request->id);
        $data = Karzina2::where('user_id', $da->id)->where('zakaz', 1)->get();
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr style="border-bottom: 1px solid;">
                    <td>'.$row->user->name.'</td>
                    <td>'.$row->name.'</td>
                    <td>'.$row->summa2.'</td>
                    <td>'.$row->soni.'</td>
                    <td>'.$row->chegirma.'</td>
                    <td>'.$row->itog.'</td>
                </tr>
                ';
            }
        }
        else
        {
        $output = '
            <tr>
                <td align="center" colspan="6">No Data Found</td>
            </tr>
            ';
        }
        return response()->json($output);
        }
    }

    public function submitckicked(Request $request)
    {
        if($request->doimiy == 1){
            return $this->doimiyclent($request);
        }else{
            return $this->birlamchiclent($request);
        }
    }

    public function doimiyclent($request)
    {
        $foo = Karzina2::where('user_id', $request->id)->where('zakaz', 1)->get();
        foreach ($foo as $value) {
            Karzina::create([
                'tavar_id' => $value->tavar_id,
                'ichkitavar_id' => $value->ichkitavar_id,
                'name' => $value->name,
                'raqam' => $value->raqam,
                'soni' => $value->soni,
                'hajm' => $value->hajm,
                'summa' => $value->summa,
                'summa2' => $value->summa2,
                'chegirma' =>$value->chegirma,
                'itog' => $value->itog,
            ]);
            $ito = Itogo::find(1);
            if($ito){
                $j = $ito->itogo + $value->itog;
                Itogo::find(1)->update([
                    'itogo'=>$j,
                ]);
                $ito2 = Itogo::find(1);
            }
        }
        Karzina2::where('user_id', $request->id)->where('zakaz', 1)->delete();
        return response()->json(['msg'=>'Отказилди', 'data'=>$ito2]);
    }

    public function birlamchiclent($request)
    {
        $foo = Zakaz2::where('zakaz_id', $request->id)->get();
        foreach ($foo as $value) {
            Karzina::create([
                'tavar_id' => $value->tavar_id,
                'ichkitavar_id' => $value->ichkitavar_id,
                'name' => $value->name,
                'raqam' => $value->raqam,
                'soni' => $value->soni,
                'hajm' => $value->hajm,
                'summa' => $value->summa,
                'summa2' => $value->summa2,
                'chegirma' =>$value->chegirma,
                'itog' => $value->itog,
            ]);
            $ito = Itogo::find(1);
            if($ito){
                $j = $ito->itogo + $value->itog;
                Itogo::find(1)->update([
                    'itogo'=>$j,
                ]);
                $ito2 = Itogo::find(1);
            }
        }
        Zakaz2::where('zakaz_id', $request->id)->delete();
        Zakaz::find($request->id)->delete($request->id);
        return response()->json(['msg'=>'Отказилди', 'data'=>$ito2]);
    }

    public function clent_tip(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data = DB::table('users')->where('name', 'like', '%'.$query.'%')->get();
        }
        else
        {
        $data = DB::table('users')->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr data-id="'.$row->id.'" id="data" style="cursor: pointer;" style="border-bottom: 1px solid;">
                    <td>'.$row->name.'</td>
                </tr>
                ';
            }
        }
        else
        {
        $output = '
            <tr>
                <td align="center" colspan="5">No Data Found</td>
            </tr>
            ';
        }
        $data = array(
            'table_data'  => $output,
        );
        return response()->json($data);
        }
    }

    public function savdobirlamchi(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data = Karzina3::where('name', 'like', '%'.$query.'%')->get();
        }
        else
        {
        $data = Karzina3::all();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr style="border-bottom: 1px solid;">
                    <td>'.$row->tavar->name.'</td>
                    <td>'.$row->raqam.'</td>
                    <td>'.$row->soni.'</td>
                    <td>'.$row->summa2.'</td>
                    <td>'.$row->chegirma.'</td>
                    <td>'.$row->itog.'</td>
                    <td>'.$row->updated_at.'</td>
                </tr>
                ';
            }
        }
        else
        {
        $output = '
            <tr>
                <td align="center" colspan="7">No Data Found</td>
            </tr>
            ';
        }
        $data = array(
            'table_data'  => $output,
        );
        return response()->json($data);
        }
    }
    
    public function vseclent(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $output2 = '';
            $data = Karzina2::all();     
            $data222 = Arxiv::all();     
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
                    <tr style="border-bottom: 1px solid;">
                        <td>'.$row->user->name.'</td>
                        <td>'.$row->tavar->name.'</td>
                        <td>'.$row->raqam.'</td>
                        <td>'.$row->soni.'</td>
                        <td>'.$row->summa2.'</td>
                        <td>'.$row->chegirma.'</td>
                        <td>'.$row->itog.'</td>
                        <td>'.$row->updated_at.'</td>
                    </tr>
                    ';
                }
                foreach($data222 as $row)
                {
                    $output2 .= '
                    <tr style="border-bottom: 1px solid;">
                        <td>'.$row->user->name.'</td>
                        <td>'.$row->itogs.'</td>
                        <td>'.$row->naqt.'</td>
                        <td>'.$row->plastik.'</td>
                        <td>'.$row->bank.'</td>
                        <td>'.$row->karzs.'</td>
                        <td>'.$row->updated_at.'</td>
                    </tr>
                    ';
                }
            }
            $foo = Clentitog::find(1);
            if($foo){
                $foo->tavarshtuk = 0;
                $foo->shtuk = 0;
                $foo->foiz = 0;
                $foo->itog = 0;
                $foo->opshi = 0;
                $foo->save();
                foreach ($data as $value) {
                    $fool = Clentitog::find(1);
                    $shtuk = $fool->shtuk + $value->soni;
                    Clentitog::find(1)->update([
                        'tavarshtuk'=>$total_row,
                        'shtuk'=>$shtuk,
                    ]);
                }
                foreach ($data222 as $value) {
                    $fool2 = Clentitog::find(1);
                    $a = $fool2->foiz + $value->karzs;
                    Clentitog::find(1)->update([
                        'foiz'=>$a,
                    ]);
                }
                foreach ($data as $value) {
                    $fool2 = Clentitog::find(1);
                    $a = $fool2->opshi + $value->itog;
                    Clentitog::find(1)->update([
                        'opshi'=>$a,
                    ]);
                }
            }else{
                Clentitog::create([
                    'tavarshtuk'=>0,
                    'shtuk'=>0,
                    'foiz'=>0,
                    'itog'=>0,
                    'opshi'=>0
                ]);
                foreach ($data as $value) {
                    $foo = Clentitog::find(1);        
                    $shtuk2 = $foo->shtuk + $value->soni;
                    Clentitog::find(1)->update([
                        'tavarshtuk'=>$total_row,
                        'shtuk'=>$shtuk2,
                    ]);
                }
                foreach ($data222 as $value) {
                    $fool2 = Clentitog::find(1);
                    $a = $fool2->foiz + $value->karzs;
                    Clentitog::find(1)->update([
                        'foiz'=>$a,
                    ]);
                }
                foreach ($data as $value) {
                    $fool3 = Clentitog::find(1);
                    $a1 = $fool3->opshi + $value->itog;
                    Clentitog::find(1)->update([
                        'opshi'=>$a1,
                    ]);
                }
            }
            $foo2 = Clentitog::find(1);
            return response()->json([
                'output'=>$output,
                'output2'=>$output2,
                'clent'=>"Все Клент",
                'foo2'=>$foo2??[],
            ]);
        }
    }

    public function clents2(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $output2 = '';
            $da = User::find($request->id);   
            $data = Karzina2::where('user_id', $da->id)->get();     
            $data222 = Arxiv::where('user_id', $da->id)->get();     
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
                    <tr style="border-bottom: 1px solid;">
                        <td>'.$row->user->name.'</td>
                        <td>'.$row->tavar->name.'</td>
                        <td>'.$row->raqam.'</td>
                        <td>'.$row->soni.'</td>
                        <td>'.$row->summa2.'</td>
                        <td>'.$row->chegirma.'</td>
                        <td>'.$row->itog.'</td>
                        <td>'.$row->updated_at.'</td>
                    </tr>
                    ';
                }
                foreach($data222 as $row)
                {
                    $output2 .= '
                    <tr style="border-bottom: 1px solid;">
                        <td>'.$row->user->name.'</td>
                        <td>'.$row->itogs.'</td>
                        <td>'.$row->naqt.'</td>
                        <td>'.$row->plastik.'</td>
                        <td>'.$row->bank.'</td>
                        <td>'.$row->karzs.'</td>
                        <td>'.$row->updated_at.'</td>
                    </tr>
                    ';
                }
            }
            $foo = Clentitog::find(1);
            if($foo){
                $foo->tavarshtuk = 0;
                $foo->shtuk = 0;
                $foo->foiz = 0;
                $foo->itog = 0;
                $foo->opshi = 0;
                $foo->save();
                foreach ($data as $value) {            
                    $fool = Clentitog::find(1);
                    $shtuk = $fool->shtuk + $value->soni;
                    Clentitog::find(1)->update([
                        'tavarshtuk'=>$total_row,
                        'shtuk'=>$shtuk,
                    ]);
                }
                foreach ($data222 as $value) {
                    $fool2 = Clentitog::find(1);
                    $a = $fool2->foiz + $value->karzs;
                    Clentitog::find(1)->update([
                        'foiz'=>$a,
                    ]);
                }
                foreach ($data as $value) {
                    $fool2 = Clentitog::find(1);
                    $a = $fool2->opshi + $value->itog;
                    Clentitog::find(1)->update([
                        'opshi'=>$a,
                    ]);
                }
            }else{
                Clentitog::create([
                    'tavarshtuk'=>0,
                    'shtuk'=>0,
                    'foiz'=>0,
                    'itog'=>0,
                    'opshi'=>0
                ]);
                foreach ($data as $value) {
                    $foo = Clentitog::find(1);        
                    $shtuk2 = $foo->shtuk + $value->soni;
                    Clentitog::find(1)->update([
                        'tavarshtuk'=>$total_row,
                        'shtuk'=>$shtuk2,
                    ]);
                }
                foreach ($data222 as $value) {
                    $fool2 = Clentitog::find(1);
                    $a = $fool2->foiz + $value->karzs;
                    Clentitog::find(1)->update([
                        'foiz'=>$a,
                    ]);
                }
                foreach ($data as $value) {
                    $fool3 = Clentitog::find(1);
                    $a1 = $fool3->opshi + $value->itog;
                    Clentitog::find(1)->update([
                        'opshi'=>$a1,
                    ]);
                }
            }
            $foo2 = Clentitog::find(1);
            return response()->json([
                'output'=>$output,
                'output2'=>$output2,
                'clent'=>$da,
                'foo2'=>$foo2??[],
            ]);
        }
    }

    public function clents3(Request $request)
    {
        if($request->tavar_id){
            return $this->clents4($request);
        }elseif($request->tavar_id && $request->date){
            return $this->clents5($request);
        }elseif($request->tavar_id && $request->date && $request->date2){
            return $this->clents5($request);
        }elseif($request->date){
            return $this->clents6($request);
        }elseif($request->date && $request->date2){
            return $this->clents6($request);
        }else{
            // return $this->clents2($request);
        }
    }
    public function brlamclient(Request $request)
    {
        if($request->tavar_id){
            return $this->clents04($request);
        }elseif($request->tavar_id && $request->date){
            return $this->clents05($request);
        }elseif($request->tavar_id && $request->date && $request->date2){
            return $this->clents05($request);
        }elseif($request->date){
            return $this->clents06($request);
        }elseif($request->date && $request->date2){
            return $this->clents06($request);
        }else{
            // return $this->savdobirlamchi($request);
        }
    }

    public function clents4($request)
    {
        if($request->ajax())
        {
            $output = '';
            $output2 = '';
            $da = User::find($request->id);   
            $data = Karzina2::where('user_id', $da->id)
                            ->where('tavar_id', $request->tavar_id)
                            ->get();
            $data222 = Arxiv::where('user_id', $da->id)->get();
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
                    <tr style="border-bottom: 1px solid;">
                        <td>'.$row->user->name.'</td>
                        <td>'.$row->tavar->name.'</td>
                        <td>'.$row->raqam.'</td>
                        <td>'.$row->soni.'</td>
                        <td>'.$row->summa2.'</td>
                        <td>'.$row->chegirma.'</td>
                        <td>'.$row->itog.'</td>
                        <td>'.$row->updated_at.'</td>
                    </tr>
                    ';
                }
                foreach($data222 as $row)
                {
                    $output2 .= '
                    <tr style="border-bottom: 1px solid;">
                        <td>'.$row->user->name.'</td>
                        <td>'.$row->itogs.'</td>
                        <td>'.$row->naqt.'</td>
                        <td>'.$row->plastik.'</td>
                        <td>'.$row->bank.'</td>
                        <td>'.$row->karzs.'</td>
                        <td>'.$row->updated_at.'</td>
                    </tr>
                    ';
                }
            }
            $foo = Clentitog::find(1);
            if($foo){
                $foo->tavarshtuk = 0;
                $foo->shtuk = 0;
                $foo->foiz = 0;
                $foo->itog = 0;
                $foo->opshi = 0;
                $foo->save();
                foreach ($data as $value) {            
                    $fool = Clentitog::find(1);
                    $shtuk = $fool->shtuk + $value->soni;
                    Clentitog::find(1)->update([
                        'tavarshtuk'=>$total_row,
                        'shtuk'=>$shtuk,
                    ]);
                }
                foreach ($data222 as $value) {
                    $fool2 = Clentitog::find(1);
                    $a = $fool2->foiz + $value->karzs;
                    Clentitog::find(1)->update([
                        'foiz'=>$a,
                    ]);
                }
                foreach ($data as $value) {
                    $fool2 = Clentitog::find(1);
                    $a = $fool2->opshi + $value->itog;
                    Clentitog::find(1)->update([
                        'opshi'=>$a,
                    ]);
                }
            }else{
                Clentitog::create([
                    'tavarshtuk'=>0,
                    'shtuk'=>0,
                    'foiz'=>0,
                    'itog'=>0,
                    'opshi'=>0
                ]);
                foreach ($data as $value) {
                    $foo = Clentitog::find(1);        
                    $shtuk2 = $foo->shtuk + $value->soni;
                    Clentitog::find(1)->update([
                        'tavarshtuk'=>$total_row,
                        'shtuk'=>$shtuk2,
                    ]);
                }
                foreach ($data222 as $value) {
                    $fool2 = Clentitog::find(1);
                    $a = $fool2->foiz + $value->karzs;
                    Clentitog::find(1)->update([
                        'foiz'=>$a,
                    ]);
                }
                foreach ($data as $value) {
                    $fool3 = Clentitog::find(1);
                    $a1 = $fool3->opshi + $value->itog;
                    Clentitog::find(1)->update([
                        'opshi'=>$a1,
                    ]);
                }
            }
            $foo2 = Clentitog::find(1);
            return response()->json([
                'output'=>$output,
                'output2'=>$output2,
                'clent'=>$da,
                'foo2'=>$foo2??[],
            ]);
        }
    }

    public function clents5($request)
    {
        if($request->ajax())
        {
            $output = '';
            $output2 = '';
            $da = User::find($request->id);   
            $data = Karzina2::where('user_id', $da->id)
                            ->where('tavar_id', $request->tavar_id)
                            ->whereBetween('updated_at', [$request->date, $request->date2])
                            ->get(); 
            $data222 = Arxiv::where('user_id', $da->id)->whereBetween('updated_at', [$request->date, $request->date2])->get();
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
                    <tr style="border-bottom: 1px solid;">
                        <td>'.$row->user->name.'</td>
                        <td>'.$row->tavar->name.'</td>
                        <td>'.$row->raqam.'</td>
                        <td>'.$row->soni.'</td>
                        <td>'.$row->summa2.'</td>
                        <td>'.$row->chegirma.'</td>
                        <td>'.$row->itog.'</td>
                        <td>'.$row->updated_at.'</td>
                    </tr>
                    ';
                }
                foreach($data222 as $row)
                {
                    $output2 .= '
                    <tr style="border-bottom: 1px solid;">
                        <td>'.$row->user->name.'</td>
                        <td>'.$row->itogs.'</td>
                        <td>'.$row->naqt.'</td>
                        <td>'.$row->plastik.'</td>
                        <td>'.$row->bank.'</td>
                        <td>'.$row->karzs.'</td>
                        <td>'.$row->updated_at.'</td>
                    </tr>
                    ';
                }
            }
            $foo = Clentitog::find(1);
            if($foo){
                $foo->tavarshtuk = 0;
                $foo->shtuk = 0;
                $foo->foiz = 0;
                $foo->itog = 0;
                $foo->opshi = 0;
                $foo->save();
                foreach ($data as $value) {            
                    $fool = Clentitog::find(1);
                    $shtuk = $fool->shtuk + $value->soni;
                    Clentitog::find(1)->update([
                        'tavarshtuk'=>$total_row,
                        'shtuk'=>$shtuk,
                    ]);
                }
                foreach ($data222 as $value) {
                    $fool2 = Clentitog::find(1);
                    $a = $fool2->foiz + $value->karzs;
                    Clentitog::find(1)->update([
                        'foiz'=>$a,
                    ]);
                }
                foreach ($data as $value) {
                    $fool2 = Clentitog::find(1);
                    $a = $fool2->opshi + $value->itog;
                    Clentitog::find(1)->update([
                        'opshi'=>$a,
                    ]);
                }
            }else{
                Clentitog::create([
                    'tavarshtuk'=>0,
                    'shtuk'=>0,
                    'foiz'=>0,
                    'itog'=>0,
                    'opshi'=>0
                ]);
                foreach ($data as $value) {
                    $foo = Clentitog::find(1);        
                    $shtuk2 = $foo->shtuk + $value->soni;
                    Clentitog::find(1)->update([
                        'tavarshtuk'=>$total_row,
                        'shtuk'=>$shtuk2,
                    ]);
                }
                foreach ($data222 as $value) {
                    $fool2 = Clentitog::find(1);
                    $a = $fool2->foiz + $value->karzs;
                    Clentitog::find(1)->update([
                        'foiz'=>$a,
                    ]);
                }
                foreach ($data as $value) {
                    $fool3 = Clentitog::find(1);
                    $a1 = $fool3->opshi + $value->itog;
                    Clentitog::find(1)->update([
                        'opshi'=>$a1,
                    ]);
                }
            }
            $foo2 = Clentitog::find(1);
            return response()->json([
                'output'=>$output,
                'output2'=>$output2,
                'clent'=>$da,
                'foo2'=>$foo2??[],
            ]);
        }
    }
    public function clents6($request)
    {
        if($request->id){
            if($request->ajax())
            {
                $output = '';
                $output2 = '';
                $da = User::find($request->id);   
                $data = Karzina2::where('user_id', $da->id)
                                ->whereBetween('updated_at', [$request->date, $request->date2])
                                ->get();
                $data222 = Arxiv::where('user_id', $da->id)->whereBetween('updated_at', [$request->date, $request->date2])->get();
                $total_row = $data->count();
                if($total_row > 0)
                {
                    foreach($data as $row)
                    {
                        $output .= '
                        <tr style="border-bottom: 1px solid;">
                            <td>'.$row->user->name.'</td>
                            <td>'.$row->tavar->name.'</td>
                            <td>'.$row->raqam.'</td>
                            <td>'.$row->soni.'</td>
                            <td>'.$row->summa2.'</td>
                            <td>'.$row->chegirma.'</td>
                            <td>'.$row->itog.'</td>
                            <td>'.$row->updated_at.'</td>
                        </tr>
                        ';
                    }
                    foreach($data222 as $row)
                    {
                        $output2 .= '
                        <tr style="border-bottom: 1px solid;">
                            <td>'.$row->user->name.'</td>
                            <td>'.$row->itogs.'</td>
                            <td>'.$row->naqt.'</td>
                            <td>'.$row->plastik.'</td>
                            <td>'.$row->bank.'</td>
                            <td>'.$row->karzs.'</td>
                            <td>'.$row->updated_at.'</td>
                        </tr>
                        ';
                    }
                }
                $foo = Clentitog::find(1);
                if($foo){
                    $foo->tavarshtuk = 0;
                    $foo->shtuk = 0;
                    $foo->foiz = 0;
                    $foo->itog = 0;
                    $foo->opshi = 0;
                    $foo->save();
                    foreach ($data as $value) {            
                        $fool = Clentitog::find(1);
                        $shtuk = $fool->shtuk + $value->soni;
                        Clentitog::find(1)->update([
                            'tavarshtuk'=>$total_row,
                            'shtuk'=>$shtuk,
                        ]);
                    }
                    foreach ($data222 as $value) {
                        $fool2 = Clentitog::find(1);
                        $a = $fool2->foiz + $value->karzs;
                        Clentitog::find(1)->update([
                            'foiz'=>$a,
                        ]);
                    }
                    foreach ($data as $value) {
                        $fool2 = Clentitog::find(1);
                        $a = $fool2->opshi + $value->itog;
                        Clentitog::find(1)->update([
                            'opshi'=>$a,
                        ]);
                    }
                }else{
                    Clentitog::create([
                        'tavarshtuk'=>0,
                        'shtuk'=>0,
                        'foiz'=>0,
                        'itog'=>0,
                        'opshi'=>0
                    ]);
                    foreach ($data as $value) {
                        $foo = Clentitog::find(1);        
                        $shtuk2 = $foo->shtuk + $value->soni;
                        Clentitog::find(1)->update([
                            'tavarshtuk'=>$total_row,
                            'shtuk'=>$shtuk2,
                        ]);
                    }
                    foreach ($data222 as $value) {
                        $fool2 = Clentitog::find(1);
                        $a = $fool2->foiz + $value->karzs;
                        Clentitog::find(1)->update([
                            'foiz'=>$a,
                        ]);
                    }
                    foreach ($data as $value) {
                        $fool3 = Clentitog::find(1);
                        $a1 = $fool3->opshi + $value->itog;
                        Clentitog::find(1)->update([
                            'opshi'=>$a1,
                        ]);
                    }
                }
                $foo2 = Clentitog::find(1);
                return response()->json([
                    'output'=>$output,
                    'output2'=>$output2,
                    'clent'=>$da,
                    'foo2'=>$foo2??[],
                ]);
            }
        }else{
            if($request->ajax())
            {
                $output = '';
                $output2 = '';
                $da = User::find($request->id);   
                $data = Karzina2::whereBetween('updated_at', [$request->date, $request->date2])->get();
                $data222 = Arxiv::whereBetween('updated_at', [$request->date, $request->date2])->get();
                $total_row = $data->count();
                if($total_row > 0)
                {
                    foreach($data as $row)
                    {
                        $output .= '
                        <tr style="border-bottom: 1px solid;">
                            <td>'.$row->user->name.'</td>
                            <td>'.$row->tavar->name.'</td>
                            <td>'.$row->raqam.'</td>
                            <td>'.$row->soni.'</td>
                            <td>'.$row->summa2.'</td>
                            <td>'.$row->chegirma.'</td>
                            <td>'.$row->itog.'</td>
                            <td>'.$row->updated_at.'</td>
                        </tr>
                        ';
                    }
                    foreach($data222 as $row)
                    {
                        $output2 .= '
                        <tr style="border-bottom: 1px solid;">
                            <td>'.$row->user->name.'</td>
                            <td>'.$row->itogs.'</td>
                            <td>'.$row->naqt.'</td>
                            <td>'.$row->plastik.'</td>
                            <td>'.$row->bank.'</td>
                            <td>'.$row->karzs.'</td>
                            <td>'.$row->updated_at.'</td>
                        </tr>
                        ';
                    }
                }
                $foo = Clentitog::find(1);
                if($foo){
                    $foo->tavarshtuk = 0;
                    $foo->shtuk = 0;
                    $foo->foiz = 0;
                    $foo->itog = 0;
                    $foo->opshi = 0;
                    $foo->save();
                    foreach ($data as $value) {            
                        $fool = Clentitog::find(1);
                        $shtuk = $fool->shtuk + $value->soni;
                        Clentitog::find(1)->update([
                            'tavarshtuk'=>$total_row,
                            'shtuk'=>$shtuk,
                        ]);
                    }
                    foreach ($data222 as $value) {
                        $fool2 = Clentitog::find(1);
                        $a = $fool2->foiz + $value->karzs;
                        Clentitog::find(1)->update([
                            'foiz'=>$a,
                        ]);
                    }
                    foreach ($data as $value) {
                        $fool2 = Clentitog::find(1);
                        $a = $fool2->opshi + $value->itog;
                        Clentitog::find(1)->update([
                            'opshi'=>$a,
                        ]);
                    }
                }else{
                    Clentitog::create([
                        'tavarshtuk'=>0,
                        'shtuk'=>0,
                        'foiz'=>0,
                        'itog'=>0,
                        'opshi'=>0
                    ]);
                    foreach ($data as $value) {
                        $foo = Clentitog::find(1);        
                        $shtuk2 = $foo->shtuk + $value->soni;
                        Clentitog::find(1)->update([
                            'tavarshtuk'=>$total_row,
                            'shtuk'=>$shtuk2,
                        ]);
                    }
                    foreach ($data222 as $value) {
                        $fool2 = Clentitog::find(1);
                        $a = $fool2->foiz + $value->karzs;
                        Clentitog::find(1)->update([
                            'foiz'=>$a,
                        ]);
                    }
                    foreach ($data as $value) {
                        $fool3 = Clentitog::find(1);
                        $a1 = $fool3->opshi + $value->itog;
                        Clentitog::find(1)->update([
                            'opshi'=>$a1,
                        ]);
                    }
                }
                $foo2 = Clentitog::find(1);
                return response()->json([
                    'output'=>$output,
                    'output2'=>$output2,
                    'clent'=>"Все клент",
                    'foo2'=>$foo2??[],
                ]);
            }
        }
    }
    public function clents04($request)
    {
        if($request->ajax())
        {
            $output = '';
            $output2 = '';  
            $data = Karzina3::where('tavar_id', $request->tavar_id)->get();
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
                    <tr style="border-bottom: 1px solid;">
                        <td>'.$row->tavar->name.'</td>
                        <td>'.$row->raqam.'</td>
                        <td>'.$row->soni.'</td>
                        <td>'.$row->summa2.'</td>
                        <td>'.$row->chegirma.'</td>
                        <td>'.$row->itog.'</td>
                        <td>'.$row->updated_at.'</td>
                    </tr>
                    ';
                }
            }
            $foo = Clentitog::find(1);
            if($foo){
                $foo->tavarshtuk = 0;
                $foo->shtuk = 0;
                $foo->foiz = 0;
                $foo->itog = 0;
                $foo->opshi = 0;
                $foo->save();
                foreach ($data as $value) {            
                    $fool = Clentitog::find(1);
                    $shtuk = $fool->shtuk + $value->soni;
                    Clentitog::find(1)->update([
                        'tavarshtuk'=>$total_row,
                        'shtuk'=>$shtuk,
                    ]);
                }
                foreach ($data as $value) {
                    $fool2 = Clentitog::find(1);
                    $a = $fool2->opshi + $value->itog;
                    Clentitog::find(1)->update([
                        'opshi'=>$a,
                    ]);
                }
            }else{
                Clentitog::create([
                    'tavarshtuk'=>0,
                    'shtuk'=>0,
                    'foiz'=>0,
                    'itog'=>0,
                    'opshi'=>0
                ]);
                foreach ($data as $value) {
                    $foo = Clentitog::find(1);        
                    $shtuk2 = $foo->shtuk + $value->soni;
                    Clentitog::find(1)->update([
                        'tavarshtuk'=>$total_row,
                        'shtuk'=>$shtuk2,
                    ]);
                }
                foreach ($data as $value) {
                    $fool3 = Clentitog::find(1);
                    $a1 = $fool3->opshi + $value->itog;
                    Clentitog::find(1)->update([
                        'opshi'=>$a1,
                    ]);
                }
            }
            $foo2 = Clentitog::find(1);
            return response()->json([
                'output'=>$output,
                'output2'=>$output2,
                'foo2'=>$foo2??[],
            ]);
        }
    }
    public function clents05($request)
    {
        if($request->ajax())
        {
            $output = '';
            $output2 = '';
            $data = Karzina3::where('tavar_id', $request->tavar_id)->whereBetween('updated_at', [$request->date, $request->date2])->get(); 
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
                    <tr style="border-bottom: 1px solid;">
                        <td>'.$row->tavar->name.'</td>
                        <td>'.$row->raqam.'</td>
                        <td>'.$row->soni.'</td>
                        <td>'.$row->summa2.'</td>
                        <td>'.$row->chegirma.'</td>
                        <td>'.$row->itog.'</td>
                        <td>'.$row->updated_at.'</td>
                    </tr>
                    ';
                }
            }
            $foo = Clentitog::find(1);
            if($foo){
                $foo->tavarshtuk = 0;
                $foo->shtuk = 0;
                $foo->foiz = 0;
                $foo->itog = 0;
                $foo->opshi = 0;
                $foo->save();
                foreach ($data as $value) {            
                    $fool = Clentitog::find(1);
                    $shtuk = $fool->shtuk + $value->soni;
                    Clentitog::find(1)->update([
                        'tavarshtuk'=>$total_row,
                        'shtuk'=>$shtuk,
                    ]);
                }
                foreach ($data as $value) {
                    $fool2 = Clentitog::find(1);
                    $a = $fool2->opshi + $value->itog;
                    Clentitog::find(1)->update([
                        'opshi'=>$a,
                    ]);
                }
            }else{
                Clentitog::create([
                    'tavarshtuk'=>0,
                    'shtuk'=>0,
                    'foiz'=>0,
                    'itog'=>0,
                    'opshi'=>0
                ]);
                foreach ($data as $value) {
                    $foo = Clentitog::find(1);        
                    $shtuk2 = $foo->shtuk + $value->soni;
                    Clentitog::find(1)->update([
                        'tavarshtuk'=>$total_row,
                        'shtuk'=>$shtuk2,
                    ]);
                }
                foreach ($data as $value) {
                    $fool3 = Clentitog::find(1);
                    $a1 = $fool3->opshi + $value->itog;
                    Clentitog::find(1)->update([
                        'opshi'=>$a1,
                    ]);
                }
            }
            $foo2 = Clentitog::find(1);
            return response()->json([
                'output'=>$output,
                'output2'=>$output2,
                'foo2'=>$foo2??[],
            ]);
        }
    }
    public function clents06($request)
    {
        if($request->ajax())
        {
            $output = '';
            $output2 = '';
            $data = Karzina3::whereBetween('updated_at', [$request->date, $request->date2])->get();
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
                    <tr style="border-bottom: 1px solid;">
                        <td>'.$row->tavar->name.'</td>
                        <td>'.$row->raqam.'</td>
                        <td>'.$row->soni.'</td>
                        <td>'.$row->summa2.'</td>
                        <td>'.$row->chegirma.'</td>
                        <td>'.$row->itog.'</td>
                        <td>'.$row->updated_at.'</td>
                    </tr>
                    ';
                }
            }
            $foo = Clentitog::find(1);
            if($foo){
                $foo->tavarshtuk = 0;
                $foo->shtuk = 0;
                $foo->foiz = 0;
                $foo->itog = 0;
                $foo->opshi = 0;
                $foo->save();
                foreach ($data as $value) {            
                    $fool = Clentitog::find(1);
                    $shtuk = $fool->shtuk + $value->soni;
                    Clentitog::find(1)->update([
                        'tavarshtuk'=>$total_row,
                        'shtuk'=>$shtuk,
                    ]);
                }
                foreach ($data as $value) {
                    $fool2 = Clentitog::find(1);
                    $a = $fool2->opshi + $value->itog;
                    Clentitog::find(1)->update([
                        'opshi'=>$a,
                    ]);
                }
            }else{
                Clentitog::create([
                    'tavarshtuk'=>0,
                    'shtuk'=>0,
                    'foiz'=>0,
                    'itog'=>0,
                    'opshi'=>0
                ]);
                foreach ($data as $value) {
                    $foo = Clentitog::find(1);        
                    $shtuk2 = $foo->shtuk + $value->soni;
                    Clentitog::find(1)->update([
                        'tavarshtuk'=>$total_row,
                        'shtuk'=>$shtuk2,
                    ]);
                }
                foreach ($data as $value) {
                    $fool3 = Clentitog::find(1);
                    $a1 = $fool3->opshi + $value->itog;
                    Clentitog::find(1)->update([
                        'opshi'=>$a1,
                    ]);
                }
            }
            $foo2 = Clentitog::find(1);
            return response()->json([
                'output'=>$output,
                'output2'=>$output2,
                'foo2'=>$foo2??[],
            ]);
        }
    }

    public function tavarvse(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $data = Ichkitavar::all();
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr style="border-bottom: 1px solid;">
                    <td>'.$row->tavar->name.'</td>
                    <td>'.$row->adress.'</td>
                    <td>'.$row->name.'</td>
                    <td>'.$row->hajm.'</td>
                    <td>'.$row->summa.'</td>
                    <td>'.$row->summa2.'</td>
                    <td>'.$row->summa3.'</td>
                    <td>'.$row->updated_at.'</td>
                </tr>
                ';
            }
            $foo = Data::find(1);
            if($foo){
                $foo->tavarshtuk = 0;
                $foo->shtuk = 0;
                $foo->foiz = 0;
                $foo->dateitog = 0;
                $foo->opshi = 0;
                $foo->save();
                foreach ($data as $value) {            
                    $fool = Data::find(1);
                    $shtuk = $fool->shtuk + $value->hajm;
                    $dateitog = $fool->dateitog + $value->summa;
                    Data::find(1)->update([
                        'tavarshtuk'=>$total_row,
                        'shtuk'=>$shtuk,
                        'dateitog'=>$dateitog,
                    ]);
                }
                foreach ($data as $value) {
                    $fool2 = Data::find(1);
                    $a = $fool2->opshi + $value->summa;
                    Data::find(1)->update([
                        'opshi'=>$a,
                    ]);
                }
            }else{
                Data::create([
                    'dateitog'=>0
                ]);
                foreach ($data as $value) {
                    $foo = Data::find(1);        
                    $shtuk2 = $foo->shtuk + $value->hajm;
                    $dateitog2 = $foo->dateitog + $value->summa;
                    Data::find(1)->update([
                        'tavarshtuk'=>$total_row,
                        'shtuk'=>$shtuk2,
                        'dateitog'=>$dateitog2,
                    ]);
                }
                foreach ($data as $value) {
                    $fool3 = Data::find(1);
                    $a1 = $fool3->opshi + $value->summa;
                    Data::find(1)->update([
                        'opshi'=>$a1,
                    ]);
                }
            }
            $foo2 = Data::find(1);
        }
        return response()->json([
            'output'=>$output, 
            'total_row'=>$total_row,
            'data'=>$data,
            'foo2'=>$foo2??[],
        ]);
        }
    }

    public function tavar(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('id');
        $data = Ichkitavar::where('tavar_id', $query)->get();
        $get = Ichkitavar::all();
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr style="border-bottom: 1px solid;">
                    <td>'.$row->tavar->name.'</td>
                    <td>'.$row->adress.'</td>
                    <td>'.$row->name.'</td>
                    <td>'.$row->hajm.'</td>
                    <td>'.$row->summa.'</td>
                    <td>'.$row->summa2.'</td>
                    <td>'.$row->summa3.'</td>
                    <td>'.$row->updated_at.'</td>
                </tr>
                ';
            }
            $foo = Data::find(1);
            if($foo){
                $foo->tavarshtuk = 0;
                $foo->shtuk = 0;
                $foo->foiz = 0;
                $foo->dateitog = 0;
                $foo->opshi = 0;
                $foo->save();
                foreach ($data as $value) {            
                    $fool = Data::find(1);        
                    $shtuk = $fool->shtuk + $value->hajm;
                    $dateitog = $fool->dateitog + $value->summa;
                    Data::find(1)->update([
                        'tavarshtuk'=>$total_row,
                        'shtuk'=>$shtuk,
                        'dateitog'=>$dateitog,
                    ]);
                }
                foreach ($get as $value) {
                    $fool2 = Data::find(1);
                    $a = $fool2->opshi + $value->summa;
                    Data::find(1)->update([
                        'opshi'=>$a,
                    ]);
                }
            }else{
                Data::create([
                    'dateitog'=>0
                ]);
                foreach ($data as $value) {
                    $foo = Data::find(1);        
                    $shtuk2 = $foo->shtuk + $value->hajm;
                    $dateitog2 = $foo->dateitog + $value->summa;
                    Data::find(1)->update([
                        'tavarshtuk'=>$total_row,
                        'shtuk'=>$shtuk2,
                        'dateitog'=>$dateitog2,
                    ]);
                }
                foreach ($get as $value) {
                    $fool3 = Data::find(1);
                    $a1 = $fool3->opshi + $value->summa;
                    Data::find(1)->update([
                        'opshi'=>$a1,
                    ]);
                }
            }
            $foo2 = Data::find(1);
        }
        return response()->json([
            'output'=>$output, 
            'total_row'=>$total_row,
            'data'=>$data,
            'foo2'=>$foo2??[],
        ]);
        }
    }

    public function search(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $data = Ichkitavar::whereBetween('updated_at', [$request->date, $request->date2])->get();
        $total_row = $data->count();
        if($total_row > 0)
        {
            foreach($data as $row)
            {
                $output .= '
                <tr style="border-bottom: 1px solid;">
                    <td>'.$row->tavar->name.'</td>
                    <td>'.$row->adress.'</td>
                    <td>'.$row->name.'</td>
                    <td>'.$row->hajm.'</td>
                    <td>'.$row->summa.'</td>
                    <td>'.$row->summa2.'</td>
                    <td>'.$row->summa3.'</td>
                    <td>'.$row->updated_at.'</td>
                </tr>
                ';
            }
            $foo = Data::find(1);
            if($foo){
                $foo->tavarshtuk = 0;
                $foo->shtuk = 0;
                $foo->foiz = 0;
                $foo->dateitog = 0;
                $foo->opshi = 0;
                $foo->save();
                foreach ($data as $value) {            
                    $fool = Data::find(1);        
                    $shtuk = $fool->shtuk + $value->hajm;
                    $dateitog = $fool->dateitog + $value->summa;
                    Data::find(1)->update([
                        'tavarshtuk'=>$total_row,
                        'shtuk'=>$shtuk,
                        'dateitog'=>$dateitog,
                    ]);
                }
                foreach ($data as $value) {
                    $fool2 = Data::find(1);
                    $a = $fool2->opshi + $value->summa;
                    Data::find(1)->update([
                        'opshi'=>$a,
                    ]);
                }
            }else{
                Data::create([
                    'dateitog'=>0
                ]);
                foreach ($data as $value) {
                    $foo = Data::find(1);        
                    $shtuk2 = $foo->shtuk + $value->hajm;
                    $dateitog2 = $foo->dateitog + $value->summa;
                    Data::find(1)->update([
                        'tavarshtuk'=>$total_row,
                        'shtuk'=>$shtuk2,
                        'dateitog'=>$dateitog2,
                    ]);
                }
                foreach ($data as $value) {
                    $fool3 = Data::find(1);
                    $a1 = $fool3->opshi + $value->summa;
                    Data::find(1)->update([
                        'opshi'=>$a1,
                    ]);
                }
            }
            $foo2 = Data::find(1);
        }
        return response()->json([
            'output'=>$output, 
            'total_row'=>$total_row,
            'data'=>$data,
            'foo2'=>$foo2??[],
        ]);
        }
    }

    public function data(Request $request)
    {
        $foo = Data::find(1);
        if($foo){
            $foo->dateitog = 0;
            $foo->save();
            $variable = Ichkitavar::whereBetween('updated_at', [$request->date, $request->date2])->get();
            foreach ($variable as $value) {            
                $foo = Data::find(1);        
                $a = $foo->dateitog + $value->summa;
                Data::find(1)->update([
                    'dateitog'=>$a
                ]);
                $foo2 = Data::find(1);
            }
            return $foo2;
        }else{
            Data::create([
                'dateitog'=>0
            ]);
            return $this->data2($request);
        }
    }

    public function data2($request)
    {
        $variable = Ichkitavar::whereBetween('updated_at', [$request->date, $request->date2])->get();
        foreach ($variable as $value) {            
            $foo = Data::find(1);        
            $a = $foo->dateitog + $value->summa;
            Data::find(1)->update([
                'dateitog'=>$a
            ]);
            $foo2 = Data::find(1);
        }
        return $foo2;
    }

    public function datasearche(Request $request)
    {
        if($request->date && $request->date2){
            $variable = Ichkitavar::whereBetween('updated_at', [$request->date, $request->date2])->get();
            $data = Tavar::all();
            $adress = Adress::all();
            if(Session::has('IDIE')){
              $brends = Drektor::where('id','=',Session::get('IDIE'))->first();
              return view('tavar2',[
                  'brends'=>$brends,
                  'ichkitavar'=>$variable,
                  'data'=>$data,
                  'adress'=>$adress,
              ]);
            }else{
                return redirect('/logaut');
            }
        }elseif($request->date){
            $variable = Ichkitavar::where('updated_at', ">=", $request->date)->get();
            $data = Tavar::all();
            $adress = Adress::all();
            if(Session::has('IDIE')){
              $brends = Drektor::where('id','=',Session::get('IDIE'))->first();
              return view('tavar2',[
                  'brends'=>$brends,
                  'ichkitavar'=>$variable,
                  'data'=>$data,
                  'adress'=>$adress,
              ]);
            }else{
                return redirect('/logaut');
            }
        }elseif($request->date2){
            $variable = Ichkitavar::where('updated_at', ">=", $request->date2)->get();
            $data = Tavar::all();
            $adress = Adress::all();
            if(Session::has('IDIE')){
              $brends = Drektor::where('id','=',Session::get('IDIE'))->first();
              return view('tavar2',[
                  'brends'=>$brends,
                  'ichkitavar'=>$variable,
                  'data'=>$data,
                  'adress'=>$adress,
              ]);
            }else{
                return redirect('/logaut');
            }
        }else{
            return back();
        }
    }

    public function clent2()
    {
        $tavar = Tavar::all();
        if(Session::has('IDIE')){
            $brends = Drektor::where('id','=',Session::get('IDIE'))->first();
            return view('clent2',[
                'brends'=>$brends,
                'tavar'=>$tavar,
            ]);
        }else{
            return redirect('/logaut');
        }
    }

    public function prodacha()
    {
        if(Session::has('IDIE')){
            $brends = Drektor::where('id','=',Session::get('IDIE'))->first();
            return view('prodacha',[
                'brends'=>$brends,
            ]);
        }else{
            return redirect('/logaut');
        }
    }

    public function sqladiski()
    {
        if(Session::has('IDIE')){
            $brends = Drektor::where('id','=',Session::get('IDIE'))->first();
            return view('sqladski',[
                'brends'=>$brends,
            ]);
        }else{
            return redirect('/logaut');
        }
    }

    public function otkazish(Request $request)
    {        
        $data = Ichkitavar::find($request->id);
        $foo = Sqladpoytaxt::create([
            'tavar_id' =>$data->tavar_id, 
            'adress' =>$data->adress, 
            'tavar2_id' =>$data->tavar2_id, 
            'name' =>$data->name, 
            'raqam' =>$data->raqam, 
            'hajm' =>1, 
            'summa' =>$data->summa, 
            'summa2' =>$data->summa2, 
            'summa3' =>$data->summa3,
        ]);
        return response()->json(['output'=>$foo]);
    }

    public function malumotolish(Request $request)
    {
        return response()->json(Sqladpoytaxt::find($request->id));
    }

    public function plussqlad(Request $request)
    {
        $foo = Sqladpoytaxt::find($request->id);
        $data = Ichkitavar::where('tavar_id', $foo->tavar_id)
                        ->where('adress', $foo->adress)
                        ->where('tavar2_id', $foo->tavar2_id)
                        ->first();
        $foo2 = $foo->hajm + 1;
        if($data->hajm < $foo2){
            return response()->json(['status'=>0, 'data'=>$foo]);
        }else{
            Sqladpoytaxt::find($request->id)->update([
                'hajm'=>$foo2
            ]);
        }
        $date = Sqladpoytaxt::find($request->id);
        return response()->json(['status'=>200, 'data'=>$date]);
    }

    public function minussqlad(Request $request)
    {
        $foo = Sqladpoytaxt::find($request->id);
        $foo2 = $foo->hajm - 1;
        if($foo2 == 0){
            return response()->json(['status'=>0, 'data'=>$foo]);
        }else{
            Sqladpoytaxt::find($request->id)->update([
                'hajm'=>$foo2
            ]);
        }
        $date = Sqladpoytaxt::find($request->id);
        return response()->json(['status'=>200, 'data'=>$date]);
    }

    public function udalitsqlad(Request $request)
    {
        Sqladpoytaxt::find($request->id)->delete($request->id);   
        return response()->json(['status'=>200]);
    }
    public function yangilashsqlad(Request $request)
    {
        return response()->json(Sqladpoytaxt::find($request->id));
    }
    
    public function saqlashsqlad(Request $request)
    {
        $foo = Sqladpoytaxt::find($request->id);
        $data = Ichkitavar::where('tavar_id', $foo->tavar_id)
                        ->where('adress', $foo->adress)
                        ->where('tavar2_id', $foo->tavar2_id)
                        ->first();
        if($data->hajm < $request->son){
            return response()->json(['status'=>0, 'data'=>$foo]);
        }else{
            Sqladpoytaxt::find($request->id)->update([
                'hajm'=>$request->son
            ]);
        }
        $date = Sqladpoytaxt::find($request->id);
        return response()->json(['status'=>200, 'data'=>$date]);
    }

    public function tayyorsqlad(Request $request)
    {
        $data = Sqladpoytaxt::all();
        foreach($data as $data2){
            $sss = Tayyorsqlad::where('tavar_id', $data2->tavar_id)
                        ->where('adress', $data2->adress)
                        ->where('tavar2_id', $data2->tavar2_id)
                        ->first();
            if($sss){
                $swer = $sss->hajm + $data2->hajm;
                Tayyorsqlad::where('tavar_id', $data2->tavar_id)
                        ->where('adress', $data2->adress)
                        ->where('tavar2_id', $data2->tavar2_id)
                        ->update([
                            'name' =>$data2->name, 
                            'raqam' =>$data2->raqam, 
                            'hajm' =>$swer, 
                            'summa' =>$data2->summa, 
                            'summa2' =>$data2->summa2, 
                            'summa3' =>$data2->summa3,
                        ]);
                $ssss = Ichkitavar::where('tavar_id', $data2->tavar_id)
                                ->where('adress', $data2->adress)
                                ->where('tavar2_id', $data2->tavar2_id)
                                ->first();
                $ccc = $ssss->hajm - $data2->hajm;
                Ichkitavar::where('tavar_id', $data2->tavar_id)
                        ->where('adress', $data2->adress)
                        ->where('tavar2_id', $data2->tavar2_id)
                        ->update([
                            'hajm'=>$ccc
                        ]);
                Sqladpoytaxt::where('id', ">", 0)->delete();
            }else{
                Tayyorsqlad::create([
                    'tavar_id' =>$data2->tavar_id, 
                    'adress' =>$data2->adress, 
                    'tavar2_id' =>$data2->tavar2_id, 
                    'name' =>$data2->name, 
                    'raqam' =>$data2->raqam, 
                    'hajm' =>$data2->hajm, 
                    'summa' =>$data2->summa, 
                    'summa2' =>$data2->summa2, 
                    'summa3' =>$data2->summa3,
                ]);
                $ssss = Ichkitavar::where('tavar_id', $data2->tavar_id)
                                ->where('adress', $data2->adress)
                                ->where('tavar2_id', $data2->tavar2_id)
                                ->first();
                $ccc = $ssss->hajm - $data2->hajm;
                Ichkitavar::where('tavar_id', $data2->tavar_id)
                            ->where('adress', $data2->adress)
                            ->where('tavar2_id', $data2->tavar2_id)
                            ->update([
                                'hajm'=>$ccc
                            ]);
                Sqladpoytaxt::where('id', ">", 0)->delete();
            }
        }
        return response()->json(['status'=>200]);
    }
}
