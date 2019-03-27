<?php

return  array (
		//应用ID,您的APPID。
		'app_id' => "2016092500595555",

		//商户私钥，您的原始格式RSA私钥
		'merchant_private_key' => "MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQC0J4bBN3GO1s12LkwEqgHCGquJWLZrw4KXJ9ItXEvLuFhY+4tBJ0VNW5A6d5AuUsgZU54AIo2vVBV68vyHwSwrJt/MWN4Co1HsWgLY+2/xFv7Dd8aFz9JDr4gorSYtxFRA8I7eHxmn7fYhHcK4R7CwDguw816Fhx4rgKOkDKqyQP6zm+u0dAEntpLB1whdFwA0oGODVP5MdPvS54ds5tuMC48FAr0GhT/GfucTZLq6lwLBg4Xb67/C/FE23Q346WprIroMuMDr6lNciQfT0ISLmkXlomRGdFPI2VbhvXNP/KRwNdoR97S8D70rqhErLhPlUM/NJ0baIv8X1hu1nlZXAgMBAAECggEAe6gF3unnkFvwe4Ybt7fZrRoRVB0IWb/BC2/R3EDV5eeK/MjsNLR35TlMLlWTKbi4kGnMsdsF1aqpc9MFc0kswBHW27TD7pubx9egzL8JfzqBdDnqkj6r3LnHg+QVqKRyEIEOD3jZa2Ly5pg+566NoMqDS9pArvanxsRtjlUDdYXwFdBAUmU2zfrJpYOUooTRd3YCIyyytQtaWDs4iyQEaojXLXk9cYle+TSOusmYmkNnGpSswIXetyw6e1xghO5GcZjhzBqXjGHpL65XQl6vYlfG4gku/EKdIsTdRrK/+tJYLShZQX2dQXrXxDi/6/AlzEhwImpkpFoU9fBUrGKHgQKBgQDiSZpGC4oUORF0mZ1Ds5WXvqprwtRY8oRmq8JqY+ExH78ZsWXjeRUS7qGNy0Hz4GREaojvBMKcqvjaQvqPmHCxNtjbqojDm0Alt0oTbE255tf59mRXZySKduwc94iCLlTNK42urOK/C5CrOjV7aq6QCxLk+SCVmSqTCxVKn5QGTwKBgQDLzzYyO6mLB8RaBhiRC4R7MZTwpJnVpVgR1O/AQortOEbNnRdkiBKdGVAT8orshufvM7gfh4S+Cj9egcEZnhOt3mHjRamSd+anAyA61L4aicQcWSN03weG0c0svLmSCew0sWssBZJwqfCbqyiH4o1YcJVCUMGtqg3+miGAedc1eQKBgAyPtWaqAVI6EMP+OwKlF2rDBMbSm+MMI1lns3UgckG912fftx43fHn+kS1D2Tdmf2pk15EdHIiB3SqQiUQrXCYaO1OGVe010wvE7vHBE1d8fwS7LrrDWP3uuBCrlQJU/BQflM/bfQLJ64/1vT5Kn8ITO0tGoQ5s4DYlaVspHJh1AoGBAKLf57nhQC7heCNRd9SCVc914kcl4+J/DpDBkRAenZPSQ5MSFZ27uNRfZEVssWUwsq3QsTZRQN32ponKPB1S3Ps4GxZbl5Z7x5J0xw788SeYLWdSPSmrCwLNK6Cy+cIht+isWK+HjG4JAUYGVI+zl62z2zRyATXeDu0HE/ruY/RRAoGAQcli7MIzevyjcuAz2kF9yVA6/nQ+C1M9GEQFJUfKt54t1Jt/IxTmNFTnmQIYLoN502VX/HHvlqLNE4Rm0OFD/9UOtnyEwqAhkGDGE3cuckZm0tqN8ktfAzKqM/cGWCtkbzANLlabMMiq15KYG1r6pXWbWIwHy1ahcw+h2CtzRc0=",
		'notify_url' => "http://wxshop.com/alipay/notify",
		
		//同步跳转
		'return_url' => "http://wxshop.com/alipay/return",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDIgHnOn7LLILlKETd6BFRJ0GqgS2Y3mn1wMQmyh9zEyWlz5p1zrahRahbXAfCfSqshSNfqOmAQzSHRVjCqjsAw1jyqrXaPdKBmr90DIpIxmIyKXv4GGAkPyJ/6FTFY99uhpiq0qadD/uSzQsefWo0aTvP/65zi3eof7TcZ32oWpwIDAQAB",
		//标识沙箱环境
        "mode"=>'dev'
	
);