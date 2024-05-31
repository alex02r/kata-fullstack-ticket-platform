<?php

namespace App\Http\Controllers\Api;

use App\Models\Ticket;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    public function index(Request $request){
        $tickets = Ticket::with('category', 'operator', 'status', 'priority')->orderBy('priority_id', 'asc')->orderBy('status_id', 'desc')->get();


        return response()->json([
            'success' => true,
            'results' => $tickets,
            'request' => $request->status
        ]);
    }

    public function search(Request $request)
    {
        $query = Ticket::with('category', 'operator', 'status', 'priority');
    
        if ($request->has('date') && $request->input('date') != null) {
            $query->whereDate('date', $request->input('date'));
        }
    
        if ($request->has('status') && $request->input('status') != null) {
            $query->where('status_id', $request->input('status'));
        }
    
        if ($request->has('category') && $request->input('category') != null) {
            $query->where('category_id', $request->input('category'));
        }
    
        if ($request->has('operator_id') && $request->input('operator_id') != null) {
            $query->where('operator_id', $request->input('operator_id'));
        }
    
        if (!$request->has('date') && !$request->has('status') && !$request->has('category') && !$request->has('operator_id')) {
            return response()->json(['error' => 'Devi applicare almeno un filtro'], 400);
        }
    
        // Debugga la query
        // dd($query->toSql(), $query->getBindings());
    
        $tickets = $query->paginate(12);
    
        return response()->json($tickets);
    }
    
    

    

}
