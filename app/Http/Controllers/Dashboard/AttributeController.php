<?php

namespace App\Http\Controllers\Dashboard;

use App\Attribute;
use App\AttributeGroup;
use App\AttributeValue;
use App\DataTables\AttributeDataTable;
use App\DataTables\AttributeGroupDataTable;
use App\DataTables\AttributeValueDataTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Eloquent\AttributeRepository;
use App\Repository\Eloquent\AttributeValueRepository;
use App\Http\Requests\Attributes\Store;
use App\Http\Requests\Attributes\Update;
use App\Http\Requests\Attributes\StoreAV;
use App\Http\Requests\Attributes\UpdateAV;
use App\Http\Requests\Attributes\StoreAG;
use App\Http\Requests\Attributes\UpdateAG;
use App\Repository\Eloquent\AttributeGroupsRepository;
use Illuminate\Support\Facades\Auth;

class AttributeController extends Controller
{
    protected $attributeRepo;
    protected $attributeValueRepo;
    protected $attributeGroupRepo;

    public function __construct(AttributeRepository $attributeRepository, AttributeValueRepository $attributeValueRepository, AttributeGroupsRepository $attributeGroupsRepository)
    {
        $this->middleware('auth');
        $this->middleware('role:administrator');

        $this->attributeRepo = $attributeRepository;
        $this->attributeValueRepo = $attributeValueRepository;
        $this->attributeGroupRepo = $attributeGroupsRepository;
    }

    public function getAttributes()
    {
        $attributes = $this->attributeRepo->getActiveAttributes();

        return response()->json($attributes);
    }

    public function getAttributeValues(Request $request)
    {
        $attributeValues = $this->attributeValueRepo->getAttributeValuesByAttributeId($request->attribute);

        return response()->json($attributeValues);
    }

    public function index(AttributeDataTable $dataTable)
    {
        return $dataTable->render('dashboard.attribute.index');
    }

    public function attributeValues(AttributeValueDataTable $dataTable)
    {
        return $dataTable->render('dashboard.attribute.values');
    }

    public function attributeGroups(AttributeGroupDataTable $dataTable)
    {
        return $dataTable->render('dashboard.attribute.groups');
    }

    public function create()
    {
        $groups = $this->attributeGroupRepo->getAttributeGroups();
        return view('dashboard.attribute.create', [ 'groups' => $groups ]);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $model=new Attribute();
        $model->fill($request->input());
        $model->save();

        return redirect()->route('dashboard.attributes');
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  Edit  $request
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attribute = $this->attributeRepo->findAttributeById($id);
        $groups = $this->attributeGroupRepo->getAttributeGroups();

        return view('dashboard.attribute.edit', [
            'model' => $attribute,
            'groups' => $groups
            ]);
    }

     /**
     * Update a existing resource in storage.
     *
     * @param  Update  $request
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request)
    {
        $attribute = Attribute::find($request->AttributeID);
        $attribute->fill($request->input());

        if ($attribute->save()) {

            session()->flash('app_message', 'Attribute successfully updated');
            return redirect()->route('dashboard.categories');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Attribute');
            }
        return redirect()->back();
    }

      /**
     * Delete a  resource from  storage.
     *
     * @param  Destroy  $request
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $attribute = Attribute::find($id);

        if ($attribute->delete()) {
                session()->flash('app_message', 'Attribute successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Attribute');
            }

        return redirect()->back();
    }


    public function attributeValuesCreate()
    {
        $attributes = $this->attributeRepo->getActiveAttributes();
        return view('dashboard.attribute.createValue', [ 'attributes' => $attributes ]);
    }

    public function attributeValueStore(StoreAV $request)
    {
        $model=new AttributeValue();
        $model->fill($request->input());
        $currentUser = Auth::user()->email;
        $model->CreatedUser = $currentUser;
        $model->save();

        return redirect()->route('dashboard.attributes.values');
    }

    public function attributeValuesEdit($id)
    {
        $attributeValue = $this->attributeValueRepo->findAttributeValueById($id);
        $attributes = $this->attributeRepo->getActiveAttributes();

        return view('dashboard.attribute.editValue', [
            'model' => $attributeValue,
            'attributes' => $attributes
            ]);
    }

    public function attributeValuesUpdate(UpdateAV $request)
    {
        $attribute = AttributeValue::find($request->AttributeValueID);
        $attribute->fill($request->input());

        if ($attribute->save()) {

            session()->flash('app_message', 'Attribute value successfully updated');
            return redirect()->route('dashboard.categories');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Attribute Value');
            }
        return redirect()->back();
    }

    public function attributeValuesDestroy($id)
    {
        $attribute = AttributeValue::find($id);

        if ($attribute->delete()) {
                session()->flash('app_message', 'Attribute value successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Attribute Value');
            }

        return redirect()->back();
    }


    public function attributeGroupsCreate()
    {
        return view('dashboard.attribute.createGroup');
    }

    public function attributeGroupsStore(StoreAG $request)
    {
        $model=new AttributeGroup();
        $model->fill($request->input());
        $model->save();

        return redirect()->route('dashboard.attributes.groups');
    }

    public function attributeGroupsEdit($id)
    {
        $attributeGroup = $this->attributeGroupRepo->findAttributeGroupById($id);

        return view('dashboard.attribute.editGroup', [
            'model' => $attributeGroup
            ]);
    }

    public function attributeGroupsUpdate(UpdateAG $request)
    {
        $attributeGroup = AttributeGroup::find($request->AttributeGroupID);
        $attributeGroup->fill($request->input());

        if ($attributeGroup->save()) {

            session()->flash('app_message', 'Attribute group successfully updated');
            return redirect()->route('dashboard.categories');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Attribute Group');
            }
        return redirect()->back();
    }

    public function attributeGroupsDestroy($id)
    {
        $attributeGroup = AttributeGroup::find($id);

        if ($attributeGroup->delete()) {
                session()->flash('app_message', 'Attribute group successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Attribute Group');
            }

        return redirect()->back();
    }

}
