<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemView extends Model
{
  use HasFactory;

  /**
   * The table associated with the model.
   */
  protected $table = 'item_views';

  /**
   * Indicates if the model should be timestamped.
   */
  public $timestamps = false;

  /**
   * The attributes that are mass assignable.
   */
  protected $fillable = [
    'user_id',
    'item_id',
    'viewed_at',
  ];

  /**
   * The attributes that should be cast.
   */
  protected $casts = [
    'viewed_at' => 'datetime',
  ];

  /**
   * Get the user that viewed the item.
   */
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  /**
   * Get the item that was viewed.
   */
  public function item()
  {
    return $this->belongsTo(Item::class);
  }
}
