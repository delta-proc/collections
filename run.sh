if [[ "$OSTYPE" == "linux-gnu"* ]]; then
	php -dextension=./target/release/libcollections.so test.php
elif [[ "$OSTYPE" == "darwin"* ]]; then
	php -dextension=./target/release/libcollections.dylib test.php
fi
