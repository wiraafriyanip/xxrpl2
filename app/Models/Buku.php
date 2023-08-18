<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $fillable =[
       'judul','penerbit','pengarang','jumlah'
    ];
    public function relasipenerbit ()
    {
        return $this->BelongsTo(Penerbit::class,'penerbit');
    }
}
