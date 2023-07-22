<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ProductRepository;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductController extends Controller
{

    const ROUTE = 'products.index';
    const PAGINATE = 20;
    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        return $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View
    {
        $products = $this->productRepository->paginate(self::PAGINATE);

        return view(self::ROUTE, ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductRequest $request
     * @return RedirectResponse
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        $data = $request->all();

        if ($request->hasFile('image') && $request->image->isValid()) {
            $imagePath = $request->image->store('products');
            $data['image'] = $imagePath;
        }

        $this->productRepository->create($data);

        return redirect()->route(self::ROUTE);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id): View
    {
        $productData = $this->productRepository->find($id);

        return view('products.show', ['product' => $productData]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Application|Factory|View
     */
    public function edit(int $id): View
    {
        $productData = $this->productRepository->find($id);

        return view('products.edit', ['product' => $productData]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UpdateProductRequest $request, int $id)
    {
        $productData = $this->productRepository->find($id);

        if (!$productData) {
            return redirect()->back();
        }

        $data = $request->all();

        if ($request->hasFile('image') && $request->image->isValid()) {
            if ($productData->image && Storage::exists($productData->image)){
                Storage::delete($productData->image);
            }

            $imagePath = $request->image->store('products');
            $data['image'] = $imagePath;
        }

        $productData->update($data);

        return redirect()->route(self::ROUTE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(int $id)
    {
        $productData = $this->productRepository->find($id);

        if (!$productData) {
            return redirect()->back();
        }

        if ($productData->image && Storage::exists($productData->image)) {
            Storage::delete($productData->image);
        }

        $productData->delete();

        return redirect()->route(self::ROUTE);
    }

    /**
     * Search products
     * @param Request $request
     * @return Application|Factory|View
     */
    public function search(Request $request)
    {
        $products = $this->productRepository->search($request->filter);

        return view(self::ROUTE, ['products' => $products, 'filters' => $request->except('_token')]);
    }
}
