<?php
namespace App\Repositories;

use App\Models\Grade;
use App\Models\OnlineClasses;
use App\Trait\MeetingZoomTrait;
use DB;
use Jubaer\Zoom\Facades\Zoom;

class OnlineClassesRepository implements OnlineClassesRepositoryInterface
{

    use MeetingZoomTrait;
    public function index()
    {
        $online = OnlineClasses::select('id','grade_id','class_id','section_id','user_id','meting_id','topic','start_at','duration' ,'join_url')->latest()->get();
        return view('pages.onlineClasses.index_onlineClass', compact('online'));
    }
    public function create()
    {
        $Grades = Grade::select('name', 'id')->get();
        return view('pages.onlineClasses.create_onlineClass', compact('Grades'));
    }

    public function store($request)
    {
        try {
            $meeting = $this->createMeeting($request);

            if (!isset($meeting['status']) || $meeting['status'] !== true) {
                return redirect()->back()->withErrors('حدث خطأ أثناء إنشاء الاجتماع.');
            }

            // استخراج البيانات من المصفوفه "data"
            $meetingData = $meeting['data'];

            $onlineClass = OnlineClasses::create([
                'grade_id' => $request->grade_id,
                'class_id' => $request->class_id,
                'section_id' => $request->section_id,
                'user_id' => auth()->user()->id,
                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'duration' => $request->duration,
                'meting_id' => $meetingData['id'],
                'password' => $meetingData['password'],
                'start_url' => $meetingData['start_url'],
                'join_url' => $meetingData['join_url'],
            ]);
            toastr()->success('تم إنشاء الاجتماع بنجاح');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }


    public function destroy($request)
    {
        DB::beginTransaction();  

        try {
            $meeting = OnlineClasses::where('meting_id', $request->meting_id)->firstOrFail();

            if (!$meeting->meting_id) {
                throw new \Exception("معرف الاجتماع غير موجود في قاعدة البيانات.");
            }

            $response = Zoom::deleteMeeting($meeting->meting_id);

            if (!$response || isset($response['error'])) {
                throw new \Exception("فشل في حذف الاجتماع من Zoom.");
            }

            $meeting->delete();

            DB::commit();
            toastr()->error('تم حذف الاجتماع بنجاح');
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }


    }
}