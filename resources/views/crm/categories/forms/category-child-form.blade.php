@include('forms._input',[
'label'=>'имя',
'name'=>'name',
'type'=>'string',
'value'=>isset($categories)?$categories->getName():'',
])
