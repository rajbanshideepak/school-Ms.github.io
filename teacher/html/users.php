<div class="panel">
    <div class="panel-row">
        <div class="panel-head">
            <div class="search_bar">
                <label for="search"><i class="fas fa-search-plus"></i></label>
                <input type="search" name="" id="users_src" placeholder="search by name">
            </div>
            <h3>ユーザー情報</h3>
            <div class="line">
                <select name="" id="col">
                    <option value="1" selected>登録番号</option>
                    <option value="2">メールアドレス</option>
                    <option value="3">Status</option>
                    <option value="5">登録した日付</option>
                </select>
            </div>
        </div>
        <div class="panel-body">
        <!-- container start -->
            <div class="cont_nr" style="margin-top:-25px">
                <div class="row" style="overflow:auto;padding-left:5px">
                    <div class="ht" style="width:100%;height:auto;max-height:500px;overflow:auto">
                        <table id="users">
                            <thead>
                                <tr style="border-bottom:1px solid white">
                                    <th>sn</th>
                                    <th style="text-align:center">登録番号</th>
                                    <th style="text-align:center">メールアドレス</th>
                                    <th style="text-align:center">status</th>
                                    <th style="text-align:center">OTP</th>
                                    <th style="text-align:center">登録した日付</th>
                                    <th style="text-align:left">Action</th>
                                </tr>
                            </thead>
                            <tbody id="user_body">
                            </tbody>
                        </table> 
                    </div>   
                </div>
            </div>
            <!-- container end -->
        </div>
    </div>
</div>
<script>
    
</script>