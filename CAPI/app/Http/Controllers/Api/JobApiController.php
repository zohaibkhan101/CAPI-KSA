<?php



namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobApiController extends Controller
{
    // GET /api/jobs
    public function index()
    {
        return response()->json(Job::all());
    }

    // POST /api/jobs
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'deadline' => 'nullable|date',
        ]);

        $job = Job::create($validated);

        return response()->json($job, 201);
    }

    // GET /api/jobs/{job}
    public function show(Job $job)
    {
        return response()->json($job);
    }

    // PUT/PATCH /api/jobs/{job}
    public function update(Request $request, Job $job)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'location' => 'nullable|string|max:255',
            'type' => 'nullable|string|max:255',
            'deadline' => 'nullable|date',
        ]);

        $job->update($validated);

        return response()->json($job);
    }

    // DELETE /api/jobs/{job}
    public function destroy(Job $job)
    {
        $job->delete();
        return response()->json(null, 204);
    }
}
