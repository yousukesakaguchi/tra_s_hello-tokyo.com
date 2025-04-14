<?php

//--
//   ページネーションの作成
//----------------------------------------------------


function the_pagination($pages = '', $range = 2){
  $showitems = ($range * 2)+1;

  global $paged;
  if(empty($paged)) $paged = 1;

  //ページ情報の取得
  if($pages == '') {
    global $the_query;
    $pages = $the_query->max_num_pages;
    if(!$pages){
      $pages = 1;
    }
  }

  if(1 != $pages) {
    echo '<div class="pagination">';
    echo '<ul class="pagination_list _quicksand" role="menubar" aria-label="Pagination">';

    //番号つきページ送りボタン
    $current_pgae = get_query_var( 'paged' );
    $current_pgae = $current_pgae == 0 ? '1' : $current_pgae;

    if( 1 < $current_pgae) {
      //先頭へ
      echo '<li class="first"><a href="'.get_pagenum_link(1).'"></a></li>';
      //1つ戻る
      echo '<li class="prev"><a href="'.get_pagenum_link($paged - 1).'"></a></li>';
    }

    if ($current_pgae >=4){
      for ($i=1; $i <= $pages; $i++)     {
        if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))       {
          echo ($paged == $i)? '<li class="current"><a>'.$i.'</a></li>':'<li><a href="'.get_pagenum_link($i).'" class="inactive" >'.$i.'</a></li>';
        }
      }
    } else{
      for ($i=1; $i <= $pages; $i++)     {
        if (1 != $pages &&( !($i >= $paged+$range+4-$paged || $i <= $paged-$range-1) || $pages <= $showitems ))       {
          echo ($paged == $i)? '<li class="current"><a>'.$i.'</a></li>':'<li><a href="'.get_pagenum_link($i).'" class="inactive" >'.$i.'</a></li>';
        }
      }
    }

    if($current_pgae != $pages) {
      //1つ進む
      echo '<li class="next"><a href="'.get_pagenum_link($paged + 1).'"></a></li>';
      //最後尾へ
      echo '<li class="last"><a href="'.get_pagenum_link($pages).'"></a></li>';
    }

    echo '</ul>';
    echo '<p class="pagination_total_text"><span class="_quicksand">'.$pages.'</span>ページ中 <span class="_quicksand">'.$current_pgae.'</span>ページ目を表示</p>';
    echo '</div>';
  }
}




function mod_get_adjacent_post($direction = 'prev', $post_types = 'post') {
    global $post, $wpdb;
    if(empty($post)) return NULL;
    if(!$post_types) return NULL;
    if(is_array($post_types)){
        $txt = '';
        for($i = 0; $i <= count($post_types) - 1; $i++){
            $txt .= "'".$post_types[$i]."'";
            if($i != count($post_types) - 1) $txt .= ', ';
        }
        $post_types = $txt;
    }
    $current_post_date = $post->post_date;
    $join = '';
    $in_same_cat = FALSE;
    $excluded_categories = '';
    $adjacent = $direction == 'prev' ? 'previous' : 'next';
    $op = $direction == 'prev' ? '<' : '>';
    $order = $direction == 'prev' ? 'DESC' : 'ASC';
    $join  = apply_filters( "get_{$adjacent}_post_join", $join, $in_same_cat, $excluded_categories );
    $where = apply_filters( "get_{$adjacent}_post_where", $wpdb->prepare("WHERE p.post_date $op %s AND p.post_type IN({$post_types}) AND p.post_status = 'publish'", $current_post_date), $in_same_cat, $excluded_categories );
    $sort  = apply_filters( "get_{$adjacent}_post_sort", "ORDER BY p.post_date $order LIMIT 1" );
    $query = "SELECT p.* FROM $wpdb->posts AS p $join $where $sort";
    $query_key = 'adjacent_post_' . md5($query);
    $result = wp_cache_get($query_key, 'counts');
    if ( false !== $result )
        return $result;
        $result = $wpdb->get_row("SELECT p.* FROM $wpdb->posts AS p $join $where $sort");
    if ( null === $result )
        $result = '';
        wp_cache_set($query_key, $result, 'counts');
    return $result;
}






