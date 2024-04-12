<?php

namespace App\Http\Controllers;

use App\Services\ExportService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class ExportController extends Controller
{
    public function __construct(
        private readonly ExportService $exportService,
    ) {
    }

    public function export(Request $request, string $source, string $format)
    {
        try {
            $file = $this->exportService->export($request->all(), $source, $format);
            if (file_exists($file)) {
                return Response::download($file, 'download.' . $format);
            }
        } catch (\Exception $e) {
            $request->session()->flash('admin-error', 'Ошибка экспорта');
            Log::error('Export error: ' . $e->getMessage());
            return back();
        }
    }
}
