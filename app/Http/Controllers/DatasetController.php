<?php

namespace App\Http\Controllers;

use App\Models\ModifiedDataset;
use App\Models\RemoteDataset;
use App\Service\DatasetService;
use Illuminate\Http\Request;

class DatasetController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $remoteDatasetList = RemoteDataset::all();
        return view('dataset.index',compact('remoteDatasetList'));
    }


    /**
     * @throws \JsonException
     */
    public function modifyDataset($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $record = RemoteDataset::find($id);
        if(!$record){
            return redirect()->route('datasetHome');
        }
        $dbData = json_decode($record->dataset, true, 512, JSON_THROW_ON_ERROR);
        $dataset = $dbData['menu_items'];
        DatasetService::init()->alphabetical($dataset);
        return view('dataset.modify',compact('dataset','record'));
    }

    public function saveOrder(Request $request): \Illuminate\Http\JsonResponse
    {
        $orderId = $request->get('order_id');
        $dataset = $request->get('dataset');
        $modifiedDataset = new ModifiedDataset();
        $modifiedDataset->fill([
            'remote_dataset_id' => $orderId,
            'dataset' => $dataset
        ]);
        $modifiedDataset->save();
        return response()->json([
            'success' => true,
            'message' => 'List saved',
            'data' => []
        ]);
    }

    /**
     * @throws \JsonException
     */
    public function modifiedVersions($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $record = RemoteDataset::with('modifiedVersions')->find($id);
        if(!$record){
            return redirect()->route('datasetHome');
        }
        $actualVersions = array();
        $alphaVersions = array();
        foreach($record->modifiedVersions as $version){
            $dbData = json_decode($version->dataset, true, 512, JSON_THROW_ON_ERROR);
            $dataset = $dbData['menu_items'];
            $actualVersions[] = $dataset;
            DatasetService::init()->alphabetical($dataset);
            $alphaVersions[] = $dataset;
        }
        return view('dataset.modified-version',compact('alphaVersions','actualVersions'));
    }
}
