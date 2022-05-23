<?php

namespace App\Http\Controllers;

use App\Models\Bet;
use Illuminate\Http\Request;
use App\Models\BetPosition;
use App\Models\BetDetails;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class BetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request , $id)
    {
        $result['betId']=$id;
        $result['betPosition']=BetPosition::all();
        return view('casino',$result);
    }
    public function makeBetProcess(Request $request)
    {
        $date  = Carbon::now()->subMinutes( 5 );
        $result=Bet::where('created_at', '>=', $date)
                    ->where('id',$request->bet_id)->get();
        if(!isset($result[0]->id)){
            $request->session()->flash('error','The Event Has Been Expired');
            return redirect('stop/'.$request->id);
        }

        $data=BetDetails::where('bet_id',$request->bet_id)->sum('amount');
        if($data==0){
            $data=100000;
        }
        $request->validate([
            'bet_amount'=>'required|numeric|min:100|max:'.$data,
            'slot_id' => 'required'
        ]);

        $result=new BetDetails;
        $result->bet_id=$request->bet_id;
        $result->pos_id=$request->slot_id;
        $result->user_id=$request->session()->get('USER_ID');
        $result->amount=$request->bet_amount;
        $result->status=0;
        $result->save();

        $result=Bet::find($request->bet_id);
        $result->players=$result->players+1;
        $result->save();

        return redirect('/');

    }

    public function stop(Request $request , $id)
    {
        $sum=BetDetails::select('pos_id',DB::raw("sum(amount) as total"))
                        ->where('bet_id',$id)
                        ->groupBy('pos_id')
                        ->get();
        if(isset($sum[0]->pos_id)){
            $array=[];
            foreach($sum as $value){
                $array+=[$value->pos_id => $value->total];
            } 
            $min=array_search(min($array),$array);
            
            $random=random_int(1,9);
            if(array_key_exists($random,$array)){
                $position=$min;
            }else{
                $position=$random;
            }
    
            $winners=BetDetails::where(['bet_id' => $id , "pos_id" => $position])->inRandomOrder()->limit(1)->get();
            if(!isset($winners[0]->id)){
                $winner=0;
                $betDetailsId=0;
            }else{
                $winner=$winners[0]->user_id;
                $betDetailsId=$winners[0]->id;
            }
    
            // echo $winner;
            // echo $betDetailsId;
            // echo "<pre>";
            // print_r($winners);
            // die();
        
            
            $total_amount=BetDetails::where('bet_id',$id)->sum('amount');
            $company_profit=(10/100)*$total_amount;
            $winning_amount=($total_amount-$company_profit);
            $result=Bet::find($id);
            $result->total_amount=$total_amount;
            $result->winner_price=$winning_amount;
            $result->company_profit=$company_profit;
            $result->position_id=$position;
            $result->winner_id=$winner;
            $result->status=0;
            $result->save();
    
            if($betDetailsId > 0){
                $result=BetDetails::find($betDetailsId);
                $result->status=1;
                $result->save();
            }
    
            return redirect('/');
        }else{
            $result=Bet::find($id);
            $result->status=0;
            $result->save();
            return redirect('/');
        }
        

    }

    function result(){
        $bets=BetDetails::select('bets.name','bet_positions.position','bet_details.amount','bet_details.status','bets.winner_price')
                        ->join('bets','bets.id','=','bet_details.bet_id')
                        ->join('bet_positions','bet_positions.id','=','bet_details.pos_id')
                        ->where('user_id',session()->get('USER_ID'))
                        ->get();
        return view('results',compact('bets'));
    }
    function completed(){
        $completed=Bet::select('bets.name','bet_positions.position','users.name','bets.players','bets.winner_price')
                        ->join('bet_positions','bet_positions.id','=','bets.position_id')
                        ->leftJoin('users','users.id','=','bets.winner_id')
                        ->where('bets.status',0)
                        ->get();
        return view('completed',compact('completed'));
    }

}
