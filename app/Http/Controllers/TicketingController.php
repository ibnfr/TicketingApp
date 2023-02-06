<?php

namespace App\Http\Controllers;

use App\Ticketing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class TicketingController extends Controller
{
    public function getListTicket()
    {
        $listTicket = Ticketing::all();

        return response()->json([
            'success' => true,
            'message' =>'Get List Data Ticketing',
            'data'    => $listTicket
        ], 200);
    }

    public function addTicket(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject'   => 'required',
            'message'   => 'required',
            'priority'  => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'success'   => false,
                'message'   => 'Semua Kolom Wajib Diisi!',
                'data'      => $validator->errors()
            ],401);

        } else {
            $id = Uuid::uuid4()->getHex();
            $number = mt_rand(1000000000, 9999999999);
            $status = "Open";
            $addTicket = Ticketing::create([
                'id'            => $id,
                'ticket_number' => $number,
                'subject'       => $request->input('subject'),
                'message'       => $request->input('message'),
                'priority'      => $request->input('priority'),
                'status'        => $status,
            ]);

            if ($addTicket) {
                return response()->json([
                    'success' => true,
                    'message' => 'Tiket Berhasil Disimpan!',
                    'data' => $addTicket
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Tiket Gagal Disimpan!',
                ], 400);
            }

        }
    }

    public function replyTicket(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'message'   => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Message Wajib Diisi!',
                'data'   => $validator->errors()
            ],401);

        } else {

            $statusUpdate = "Answered";

            $updateTicket = Ticketing::whereId($id)->update([
                'message'       => $request->input('message'),
                'status'        => $statusUpdate,
            ]);

            if ($updateTicket) {
                return response()->json([
                    'success' => true,
                    'message' => 'Ticket Berhasil Diupdate!',
                    'data' => $updateTicket
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Ticket Gagal Diupdate!',
                ], 400);
            }

        }
    }

    public function closeTicket($id)
    {
        $statusClose = "Close";

        $closeTicket = Ticketing::whereId($id)->update([
            'status'        => $statusClose,
        ]);

        if ($closeTicket) {
            return response()->json([
                'success' => true,
                'message' => 'Ticket Sudah Close!',
                'data' => $closeTicket
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Ticket Gagal Close!',
            ], 400);
        }
    }

    public function deleteTicket($id)
    {
        $deleteTicket = Ticketing::whereId($id)->first();
		
        $deleteTicket->delete();

        if ($deleteTicket) {
            return response()->json([
                'success' => true,
                'message' => 'Data Ticket Berhasil Dihapus!',
            ], 200);
        }
    }
}