#!/bin/bash

if [ "$GZCTF_FLAG" = "" ]; then
    GZCTF_FLAG="Sonder{0100101001010001}";
fi
echo $GZCTF_FLAG > /flag
echo "0hash_ext_attack0" > /key
# 将变量清空
unset GZCTF_FLAG
# 删除自己
rm -f $0
