<?php

namespace App;

use Carbon\Carbon; //Carregada manualmente
use App\User;
use App\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder; //Classe carregada manualmente
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'published_at'];
    //protected $guarded = ['id', 'create_at', 'updated_at']; //Lista do q NÃO pode ser alterado!
    //Se usar o $guarded, ñ pode usar o $fillabe (e vice versa)

    //protected $table = 'nome_tabela';
    //Para dar nosso próprio nome a tabela
    //o laravel por padrão converte o nome da tabela para snake case (recomendado)

    //protected $primaryKey = 'post_id';
    //Campo 'id' é por padrão a primary key, mas podemos alterar com o método acima

    //public $timestamps = false;
    //Para não procurar/definir as timestamps

    //protected $connection = 'sqlite'; //Nome da conexão
    //Caso a tabela (Post, por ex) esteja em outro banco de dados


    use SoftDeletes;
    protected $dates = ['published_at', 'deleted_at'];
    //Agora vai retornar um objeto carbon no tinker
    //deleted_at é do SoftDelete

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tags(){

        return $this->belongsToMany(Tag::class);
        //(Tag::class, 'post_tag', 'post_id', 'tag_id');
        //Segundo parametro = nome da tabela pivô
        //Terceiro parametro = Primary Key que relaciona ao ID deste (?) model
        //Quarto parametro = Foreign Key da tabela relacionada
        //Exemplo = tabela post = post_id
        //Tabela tag = tag_id
        //Nome da tabela pivo deve ser no singular, em ordem alfabética
            //Seguindo convenção acima, segundo parametro tbm é opcional
        //(Tag::class)->withTimeStamps()
            //Vai incluir timestamps.. precisa colocar tbm na classe Tag
        }


    // protected static function boot(){
    //     parent::boot();

    //     static::addGlobalScope('published', function(Builder $builder){ //Builder carregada la em cima
    //         $builder->where('published_at', '<', Carbon::now()->format('Y-m-d H:i:s'));
    //         //App\Post::all() vai retornar apenas Posts publicados (definidos aqui no escopoGlobal)
    //         // App\Post::withoutGlobalScope('published')->get()
    //             //Para buscar fora do escopo global

    //     }) ;
    // }



    // public function setTitleAttribute($value) {
    //     $this->attributes['title'] = strtolower($value);
    //     //Registra td em minusculo no banco
    // }



    // public function getTitleAttribute($value) { //Accessor
    //     return ucfirst($value);
    //     //Retorna do banco com a primeira letra maiuscula
    // }



    //Se quiser que um campo retorne com um tipo específico
    // protected $casts = [ 
    //     'asdf' => 'integer',
    // ]

    

    // public function scopeOfType($query, $type){
    //     // .. function scopeText -- Retornaria apenas do tipo texto (ñ precisaria do parametro $type)
        
    //     //No tinker:
    //         //App\Post::ofType('image')->get() //Retorna td do tipo image
    //     return $query->where('type', $type);
    // }

}
