<?php

namespace App\Models\Traits;

use App\Topic;
use App\Reply;
use Carbon\Carbon;
use Cache;
use DB;

trait ActiveUserHelper{
  // 用于存放临时用户数据
  protected $users=[];

  // 配置信息
  protected $topic_weight=4;// 话题权重
  protected $reply_weight=1;// 回复权重
  protected $pass_days=7;   // 多少天内发表过内容
  protected $user_number=6;// 多少天内发表过内容

  // 缓存相关配置
  protected $cache_key='larabbs_active_users';
  protected $cache_expire_in_minutes=65;

  public function getActiveUsers(){
    // 尝试从缓存中取出 cache_key 对应的数据。如果能取到，便直接返回数据。
    // 否则运行匿名函数中的代码来取出活跃用户数据，返回的同时做了缓存。
    return Cache::remember($this->cache_key,$this->$cache_expire_in_minutes,function(){
      return $this->calculateActiveUsers();
    })
  }

  public function calculateAndCacheActiveUsers(){
    // 取得活跃用户列表
    $active_users=$this->calculateActiveUsers();
    // 并加以缓存
    $this->cacheActiveUsers($active_users);
  }

  private function calculateActiveUsers(){
    $this->calculateTopicScore();
    $this->calculateReplyScore();

    // 数组按照得分排序
    $users=array_sort($this->users,function($user){
      return $user['score'];
    })
  }
}
