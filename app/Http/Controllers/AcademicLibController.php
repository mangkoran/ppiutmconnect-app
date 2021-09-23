<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Storage;

    class AcademicLibController extends Controller
{
    public function upload(Request $request)
    {
        $haha = $request->input('folder');
        // dd($request->file("thing")->store("", "google"));
        if ($request->hasFile('thing')){
            foreach ($request->file('thing') as $uploadFile){
                $file = $uploadFile->getClientOriginalName();
                $fileName = pathinfo($file, PATHINFO_FILENAME);
                Storage::disk("google")->putFileAs($haha, $uploadFile, $fileName);
                // $uploadFile->store("", "google");
            }
            
        }
        return redirect('/academic');
    }

}

?>