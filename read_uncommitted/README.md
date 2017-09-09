# Read uncommitted

這是在不同session中可以讀取到其他session未commit的資料

也就是有 dirty read 的現象發生

這個實驗就是在重現這個問題

首先執行 list_product.php

```
php list_product.php
```

確定沒有任何資料顯示

再開啟另一個command line視窗

執行 create_products.php

```
php create_product.php TEST
```

這隻PHP會先執行Insert

在最後rollback

但在rollback之前會sleep很久

在這隻sleep的同時

再執行一次list_product.php

```
php list_product.php
```

就可以看到剛剛Insert進去的資料

但照理說最後應該會被rollback

這是一筆注定會消失的資料

但在這筆資料消失之前

卻可以讓其他 session 讀取到

這就是 dirty read