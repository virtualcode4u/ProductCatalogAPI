# Product Catalog API Documentation  

This documentation provides details on the available API endpoints for the **Product Catalog API**.  

---

## **Base URL**  

http://your-domain.com/api/v1


---

## **Endpoints**  

### **1. Get a Single Product**
**Endpoint:**  

GET /api/v1/products/{id}

**Query Parameters (Optional):**  

| Parameter     | Type   | Description                          |
|--------------|--------|--------------------------------------|
| `id` | int    | The ID of the product       |

**Response Example:**  
```json
{
    "id": 1,
    "name": "Sample Product",
    "description": "This is a sample product",
    "sku": "SKU1234",
    "price": 99.99,
    "category_id": 2,
    "created_at": "2025-03-01T12:00:00.000Z",
    "updated_at": "2025-03-01T12:00:00.000Z"
}

```
### **3. Create a Product**
**Endpoint:**  

POST /api/v1/products

**Query Parameters (Optional):**  

| Parameter     | Type   | Description                          |
|--------------|--------|--------------------------------------|
| `name` | int    | Name of the product       |
| `description`     | Product description |
| `sku`     | int | Unique SKU identifier |
| `price`     | float | Price of the product |
| `category_id`     | int | Associated category ID |

**Example Request Body:**  
```json
{
    "name": "New Product",
    "description": "A new test product",
    "sku": "TEST123",
    "price": 49.99,
    "category_id": 2
}
```

**Example Request Body:**  

```json
{
    "message": "Product created successfully",
    "product": {
        "id": 1,
        "name": "New Product",
        "description": "A new test product",
        "sku": "TEST123",
        "price": 49.99,
        "category_id": 1,
        "created_at": "2025-03-01T12:30:00.000Z",
        "updated_at": "2025-03-01T12:30:00.000Z"
    }
}

```
### **4. Update a Product**
**Endpoint:**  

POST /api/v1/products/{id}

**Query Parameters (Optional):**  

| Parameter     | Type   | Description                          |
|--------------|--------|--------------------------------------|
| `id` | int    | The ID of the product      |

**Request Body: (Partial updates allowed)**  
```json
{
    "name": "Updated Product Name",
    "price": 79.99
}
```

**Response Example:**  
```json
{
    "message": "Product updated successfully",
    "product": {
        "id": 1,
        "name": "Updated Product Name",
        "description": "This is a sample product",
        "sku": "SKU1234",
        "price": 79.99,
        "category_id": 2,
        "created_at": "2025-03-01T12:00:00.000Z",
        "updated_at": "2025-03-01T12:45:00.000Z"
    }
}

```

### **5. Delete a Product**
**Endpoint:**  

DELETE /api/v1/products/{id}

**Query Parameters (Optional):**  

| Parameter     | Type   | Description                          |
|--------------|--------|--------------------------------------|
| `id` | int    | The ID of the product      |

**Response Example:**  
```json
{
    "message": "Product deleted successfully"
}
```

### **Error Responses**

| Status Code     | Meaning   | Example Response                          |
|--------------|--------|--------------------------------------|
| `400` | 	Bad Request    | ```json	{"error": "Invalid input data"} ```       |
| `404`     | Not Found | ```json	{"error": "Product not found"} ```  |
| `500`     | Internal Server Error | ```json	{"error": "Something went wrong"} ```   |

